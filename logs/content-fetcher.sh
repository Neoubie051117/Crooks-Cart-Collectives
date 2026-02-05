#!/usr/bin/env bash
#
# Web Content Fetcher - Modular file collection for web development
#
# Usage:
#   ./Content_Fetcher.sh [SourceDirectory] [OutputDirectory]
# Example:
#   ./Content_Fetcher.sh "./" "../Summary Output"
#

set -o errexit
set -o nounset
set -o pipefail
# Text colors
GREEN="\033[1;32m"
YELLOW="\033[1;33m"
RED="\033[1;31m"
BLUE="\033[1;34m"
RESET="\033[0m"

# Configuration
CONFIG_DIR="content fetch config"
# Get the directory where this script is located
SCRIPT_DIR="$(dirname "$(realpath "$0")")"

# --- Path Initialization ---
# Source directory - Defaults to current directory if not provided
sourceFolder="${1:-$SCRIPT_DIR}"

# Determine project root (assumed to be at the repository root level)
# Since script is in /logs/, projectRoot becomes parent directory
projectRoot="$(realpath -- "$SCRIPT_DIR/..")"
mainFolderName="$(basename "$projectRoot")"

# Output folder - Defaults to projectRoot/logs/summary fetch content
outputFolder="${2:-$projectRoot/logs/summary fetch content}"

# Ensure paths exist
sourceFolder="$(realpath -- "$sourceFolder")"
outputFolder="$(realpath -- "$outputFolder")"
mkdir -p -- "$outputFolder" || {
    echo "Error: Cannot create $outputFolder"
    exit 1
}

# =============================================================================
# Function Definitions
# =============================================================================

# Load preset configurations
load_presets() {
    local preset_dir="$SCRIPT_DIR/$CONFIG_DIR"
    local presets=()

    if [[ ! -d "$preset_dir" ]]; then
        printf "${RED}Error:${RESET} Config directory not found: %s\n" "$preset_dir" >&2
        return 1
    fi

    # Find all .sh configuration files
    while IFS= read -r -d '' file; do
        presets+=("$file")
    done < <(find "$preset_dir" -maxdepth 1 -name "*.sh" -type f -print0)

    # Print results one per line to be captured by mapfile
    printf "%s\n" "${presets[@]}"
}

# Display preset menu
show_preset_menu() {
    local presets=("$@")
    local count=${#presets[@]}

    if [[ $count -eq 0 ]]; then
        printf "${RED}No preset configurations found in %s${RESET}\n" "$CONFIG_DIR" >&2
        return 1
    fi

    printf "${GREEN}Available Presets:${RESET}\n\n"

    for ((i=0; i<count; i++)); do
        local preset_path="${presets[i]}"
        local preset_name="$(basename "$preset_path" .sh)"
        # Use simple space replacement for display name
        local display_name="${preset_name//-/ }"

        printf "[%d] %s (%s)\n" "$((i+1))" "$display_name" "$preset_name.sh"
    done

    printf "\n[0] Exit\n\n"
}

# Get user selection from menu
get_user_selection() {
    local count=$1
    local selection

    while true; do
        read -rp "$(printf "${YELLOW}Select preset [0-%d]: ${RESET}" "$count")" selection

        if [[ "$selection" =~ ^[0-9]+$ ]]; then
            if [[ $selection -eq 0 ]]; then
                printf "Exiting...\n"
                exit 0
            elif [[ $selection -ge 1 && $selection -le $count ]]; then
                # Return 0-indexed number
                echo $((selection-1))
                return
            fi
        fi
        printf "${RED}Invalid selection. Please enter a number between 0 and %d.${RESET}\n" "$count" >&2
    done
}

# Load files list from selected preset
load_files_list() {
    local preset_file="$1"

    if [[ ! -f "$preset_file" ]]; then
        printf "${RED}Error:${RESET} Preset file not found: %s\n" "$preset_file" >&2
        return 1
    fi

    # Source the preset file to get filesToCheck array
    # Note: Requires 'declare -a filesToCheck=(...)' in the preset file
    source "$preset_file"

    if [[ ${#filesToCheck[@]} -eq 0 ]]; then
        printf "${RED}Error:${RESET} No files defined in preset: %s\n" "$preset_file" >&2
        return 1
    fi

    printf "${GREEN}Loaded preset: %s with %d files${RESET}\n" "$(basename "$preset_file")" "${#filesToCheck[@]}"
}

# Process files and generate output
process_files() {
    local preset_name="$1"
    local tempFile="$2"
    local finalFile="$3"
    local fileIndex=0
    
    # Initialize temporary file
    : > "$tempFile" || { printf "${RED}Error:${RESET} Cannot write to %s\n" "$tempFile" >&2; exit 1; }
    
    printf "Web Project: %s\n" "$mainFolderName" >> "$tempFile"
    printf "Preset: %s\n" "$preset_name" >> "$tempFile"
    printf "Generated: $(date '+%Y-%m-%d %H:%M:%S')\n\n" >> "$tempFile"
    
    # Process each file in the list
    for relativePath in "${filesToCheck[@]}"; do
        # Support both absolute and relative paths
        if [[ "$relativePath" == /* ]]; then
            fullPath="$relativePath"
            displayPath="$relativePath"
        else
            fullPath="$projectRoot/$relativePath"
            displayPath="$mainFolderName/$relativePath"
        fi

        printf "=== File: %s ===\n\n" "$displayPath" >> "$tempFile"

        if [[ -f "$fullPath" ]]; then
            printf "[FOUND]\n\n" >> "$tempFile"
            
            # Add file type header for better readability
            case "$fullPath" in
                *.html|*.htm)
                    printf "<!-- HTML File Content -->\n" >> "$tempFile"
                    ;;
                *.php)
                    printf "<?php // PHP File Content ?>\n" >> "$tempFile"
                    ;;
                *.css)
                    printf "/* CSS File Content */\n" >> "$tempFile"
                    ;;
                *.js)
                    printf "/* JavaScript File Content */\n" >> "$tempFile"
                    ;;
            esac
            
            cat -- "$fullPath" >> "$tempFile"
            printf "\n" >> "$tempFile"
        else
            printf "[MISSING]\n" >> "$tempFile"
        fi
        printf "\n%s\n\n" "==============================================" >> "$tempFile"
    done

    # Handle output saving
    if [[ -f "$finalFile" ]]; then
        read -rp "$(printf "${YELLOW}File already exists: %s. Overwrite? (y/N): ${RESET}" "$finalFile")" userChoice
        if [[ "$userChoice" =~ ^[Yy]$ ]]; then
            mv -- "$tempFile" "$finalFile"
            printf "${GREEN}Overwritten:${RESET} %s\n" "$finalFile"
        else
            # Find next available indexed file name
            while [[ -f "$outputFolder/${preset_name}_Summary-$fileIndex.txt" ]]; do
                ((fileIndex++))
            done
            newFile="$outputFolder/${preset_name}_Summary-$fileIndex.txt"
            mv -- "$tempFile" "$newFile"
            printf "${GREEN}Saved as:${RESET} %s\n" "$newFile"
        fi
    else
        mv -- "$tempFile" "$finalFile"
        printf "${GREEN}Saved as:${RESET} %s\n" "$finalFile"
    fi
}

# =============================================================================
# Main Execution
# =============================================================================

main() {
    # Display banner

    printf "${YELLOW}File Content Fetcher.${RESET}\n"
    mapfile -t presets < <(load_presets)
    
    # Handle empty presets and exit if load_presets failed
    if [[ ${#presets[@]} -eq 0 ]]; then
        printf "${RED}No presets loaded. Exiting.${RESET}\n"
        exit 1
    fi
    
    # Show menu and get selection
    show_preset_menu "${presets[@]}"
    local selected_index=$(get_user_selection ${#presets[@]})
    local selected_preset="${presets[$selected_index]}"
    local preset_name="$(basename "$selected_preset" .sh)"
    
    # Load files list from selected preset
    load_files_list "$selected_preset"
    
    # Set up file names
    local tempFile="$outputFolder/temp_output.txt"
    local finalFile="$outputFolder/${preset_name}_Summary.txt"
    
    # Auto delete temp file on exit
    cleanup() {
        [[ -f "$tempFile" ]] && rm -f -- "$tempFile"
    }
    trap cleanup EXIT
    
    # Process files
    printf "${YELLOW}Processing web files...${RESET}\n"
    process_files "$preset_name" "$tempFile" "$finalFile"
    
    # Disable cleanup trap since temp file is now saved
    trap - EXIT
    printf "${GREEN}Web content fetch completed successfully!${RESET}\n"
}

main "$@"