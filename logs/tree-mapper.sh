#!/usr/bin/env bash
#
# Web Project Tree Mapper - Directory structure visualization for web projects
#

set -o errexit
set -o pipefail

# Colors
GREEN="\033[1;32m"
YELLOW="\033[1;33m"
RED="\033[1;31m"
BLUE="\033[1;34m"
CYAN="\033[1;36m"
PURPLE="\033[1;35m"
RESET="\033[0m"

# Paths
scriptDir="$(dirname "$(realpath "$0")")"
projectRoot="$(realpath "$scriptDir/..")"
logsPath="$projectRoot/logs"
summaryPath="$logsPath/summary fetch content"
mkdir -p "$summaryPath"
outputFile="$summaryPath/Project_Structure.txt"

# File type extensions for web development
declare -A fileTypes=(
    [.html]="HTML"
    [.htm]="HTML"
    [.php]="PHP"
    [.css]="CSS"
    [.js]="JavaScript"
    [.json]="JSON"
    [.md]="Markdown"
    [.txt]="Text"
    [.sh]="Shell"
    [.py]="Python"
    [.sql]="SQL"
    [.xml]="XML"
)

# File type abbreviations for display
declare -A fileAbbr=(
    [.html]="(html)"
    [.htm]="(html)"
    [.php]="(php)"
    [.css]="(css)"
    [.js]="(js)"
    [.json]="(json)"
    [.md]="(md)"
    [.txt]="(txt)"
    [.sh]="(sh)"
)

# Get file type abbreviation
get_file_type() {
    local filename="$1"
    for ext in "${!fileAbbr[@]}"; do
        if [[ "$filename" == *"$ext" ]]; then
            echo "${fileAbbr[$ext]}"
            return
        fi
    done
    
    # Check for image files
    if [[ "$filename" =~ \.(png|jpg|jpeg|gif|svg|ico|webp)$ ]]; then
        echo "(img)"
    else
        echo ""
    fi
}

# Generate mapped list
generate_map() {
    local mode="$1"

    echo -e "\n${GREEN}Generating project structure map...${RESET}"
    echo -e "Project root: ${YELLOW}$projectRoot${RESET}"
    echo -e "Output file: ${YELLOW}$outputFile${RESET}\n"

    {
        echo "================================================================"
        echo "                   WEB PROJECT STRUCTURE"
        echo "================================================================"
        echo "Project: $(basename "$projectRoot")"
        echo "Generated: $(date '+%Y-%m-%d %H:%M:%S')"
        echo "Mode: $mode"
        echo "================================================================="
        echo ""
        echo "/$(basename "$projectRoot")/"
        echo "│"
    } > "$outputFile"

    generate_tree() {
        local dirPath="$1"
        local indent="$2"
        
        # Skip hidden directories and common excluded dirs
        local baseDir="$(basename "$dirPath")"
        if [[ "$baseDir" =~ ^\. ]] || [[ "$baseDir" == "node_modules" ]] || [[ "$baseDir" == ".git" ]]; then
            return
        fi
        
        # Get all entries, sorted with directories first, then files alphabetically
        local entries=()
        # Directories first
        while IFS= read -r -d '' entry; do
            entries+=("$entry")
        done < <(find "$dirPath" -maxdepth 1 -mindepth 1 -type d -print0 | sort -z)
        # Files next
        while IFS= read -r -d '' entry; do
            entries+=("$entry")
        done < <(find "$dirPath" -maxdepth 1 -mindepth 1 -type f -print0 | sort -z)
        
        local total=${#entries[@]}
        local counter=1

        for entry in "${entries[@]}"; do
            local base=$(basename "$entry")
            
            # Skip hidden files
            if [[ "$base" =~ ^\. ]]; then
                ((counter++))
                continue
            fi
            
            local isLast=$((counter == total))
            local fileType=""

            if [[ -d "$entry" ]]; then
                if [[ $isLast -eq 1 ]]; then
                    echo "${indent}└── $base/" >> "$outputFile"
                    generate_tree "$entry" "${indent}    "
                else
                    echo "${indent}├── $base/" >> "$outputFile"
                    generate_tree "$entry" "${indent}│   "
                fi
            elif [[ -f "$entry" ]]; then
                # Filter by file type based on mode
                case "$mode" in
                    web_only)
                        if [[ "$base" != *.html && "$base" != *.htm && \
                              "$base" != *.php && "$base" != *.css && \
                              "$base" != *.js && "$base" != *.json && \
                              "$base" != *.md && "$base" != *.txt ]]; then
                            ((counter++))
                            continue
                        fi
                        ;;
                    assets_only)
                        if [[ "$base" != *.png && "$base" != *.jpg && "$base" != *.jpeg && \
                              "$base" != *.svg && "$base" != *.ico && "$base" != *.gif && \
                              "$base" != *.webp ]]; then
                            ((counter++))
                            continue
                        fi
                        ;;
                    all)
                        # Include all files
                        ;;
                esac
                
                fileType="$(get_file_type "$base")"
                if [[ $isLast -eq 1 ]]; then
                    if [[ -n "$fileType" ]]; then
                        echo "${indent}└── $base $fileType" >> "$outputFile"
                    else
                        echo "${indent}└── $base" >> "$outputFile"
                    fi
                else
                    if [[ -n "$fileType" ]]; then
                        echo "${indent}├── $base $fileType" >> "$outputFile"
                    else
                        echo "${indent}├── $base" >> "$outputFile"
                    fi
                fi
            fi
            ((counter++))
        done
    }

    # Start from project root
    # Get all directories and files at the root level, excluding logs since we handle it separately
    local rootEntries=()
    
    # Directories first (excluding logs, which we'll add at the end)
    while IFS= read -r -d '' entry; do
        local base=$(basename "$entry")
        if [[ "$base" != "logs" && ! "$base" =~ ^\. ]] && [[ "$base" != "node_modules" ]]; then
            rootEntries+=("$entry")
        fi
    done < <(find "$projectRoot" -maxdepth 1 -mindepth 1 -type d -print0 | sort -z)
    
    # Files at root level (excluding the script itself if it's in project root)
    while IFS= read -r -d '' entry; do
        local base=$(basename "$entry")
        if [[ "$base" != "$(basename "$0")" ]]; then
            rootEntries+=("$entry")
        fi
    done < <(find "$projectRoot" -maxdepth 1 -mindepth 1 -type f -print0 | sort -z)
    
    local totalRoot=${#rootEntries[@]}
    local rootCounter=1

    for entry in "${rootEntries[@]}"; do
        local base=$(basename "$entry")
        local isLast=$((rootCounter == totalRoot))
        
        # For the last entry before logs, we need special handling
        if [[ -d "$entry" ]]; then
            if [[ $isLast -eq 1 ]]; then
                echo "└── $base/" >> "$outputFile"
                generate_tree "$entry" "    "
            else
                echo "├── $base/" >> "$outputFile"
                generate_tree "$entry" "│   "
            fi
        elif [[ -f "$entry" ]]; then
            # Filter by file type based on mode
            case "$mode" in
                web_only)
                    if [[ "$base" != *.html && "$base" != *.htm && \
                          "$base" != *.php && "$base" != *.css && \
                          "$base" != *.js && "$base" != *.json && \
                          "$base" != *.md && "$base" != *.txt ]]; then
                        ((rootCounter++))
                        continue
                    fi
                    ;;
                assets_only)
                    if [[ "$base" != *.png && "$base" != *.jpg && "$base" != *.jpeg && \
                          "$base" != *.svg && "$base" != *.ico && "$base" != *.gif && \
                          "$base" != *.webp ]]; then
                        ((rootCounter++))
                        continue
                    fi
                    ;;
                all)
                    # Include all files
                    ;;
            esac
            
            local fileType="$(get_file_type "$base")"
            if [[ $isLast -eq 1 ]]; then
                if [[ -n "$fileType" ]]; then
                    echo "└── $base $fileType" >> "$outputFile"
                else
                    echo "└── $base" >> "$outputFile"
                fi
            else
                if [[ -n "$fileType" ]]; then
                    echo "├── $base $fileType" >> "$outputFile"
                else
                    echo "├── $base" >> "$outputFile"
                fi
            fi
        fi
        ((rootCounter++))
    done

    # Add logs directory at the end
    echo "└── logs/" >> "$outputFile"
    if [[ -d "$logsPath" ]]; then
        generate_tree "$logsPath" "    "
    fi

    # Add summary at the end
    {
        echo ""
        echo "================================================================="
        echo "                           SUMMARY"
        echo "================================================================="
        
        # Count files by type
        local html_count=$(find "$projectRoot" -name "*.html" -o -name "*.htm" | grep -v "/node_modules" | grep -v "/.git" | wc -l)
        local php_count=$(find "$projectRoot" -name "*.php" | grep -v "/node_modules" | grep -v "/.git" | wc -l)
        local css_count=$(find "$projectRoot" -name "*.css" | grep -v "/node_modules" | grep -v "/.git" | wc -l)
        local js_count=$(find "$projectRoot" -name "*.js" | grep -v "/node_modules" | grep -v "/.git" | wc -l)
        local json_count=$(find "$projectRoot" -name "*.json" | grep -v "/node_modules" | grep -v "/.git" | wc -l)
        local image_count=$(find "$projectRoot" \( -name "*.png" -o -name "*.jpg" -o -name "*.jpeg" -o -name "*.svg" -o -name "*.ico" -o -name "*.gif" -o -name "*.webp" \) | grep -v "/node_modules" | grep -v "/.git" | wc -l)
        local text_count=$(find "$projectRoot" -name "*.txt" -o -name "*.md" | grep -v "/node_modules" | grep -v "/.git" | wc -l)
        
        echo "HTML Files:        $html_count"
        echo "PHP Files:         $php_count"
        echo "CSS Files:         $css_count"
        echo "JavaScript Files:  $js_count"
        echo "JSON Files:        $json_count"
        echo "Text/Markdown:     $text_count"
        echo "Image Files:       $image_count"
        echo "Total Directories: $(find "$projectRoot" -type d | grep -v "/node_modules" | grep -v "/.git" | wc -l)"
        echo "Total Files:       $(find "$projectRoot" -type f | grep -v "/node_modules" | grep -v "/.git" | wc -l)"
        echo "================================================================="
        echo ""
        echo "Generated by Web Project Tree Mapper"
        echo "Script: $(basename "$0")"
        echo "================================================================="
    } >> "$outputFile"

    echo -e "\n${GREEN}Project structure mapping complete.${RESET}"
    echo -e "File created successfully at: ${YELLOW}$outputFile${RESET}\n"
}

# Menu
show_menu() {
    echo -e "${BLUE}Choose mapping option:${RESET}"
    echo "[1] Web files only (.html, .php, .css, .js, .json, .md, .txt)"
    echo "[2] All files and folders (excluding node_modules/.git)"
    echo "[3] Assets only (images, icons, media files)"
    echo "[0] Exit"
}

# Main execution
main() {
    echo -e "\n${CYAN}=== Web Project Tree Mapper ===${RESET}\n"
    echo -e "${GREEN}Project Root:${RESET} $projectRoot"
    echo -e "${GREEN}Project Name:${RESET} $(basename "$projectRoot")"
    echo -e "${GREEN}Logs Folder:${RESET} $logsPath"
    echo -e "${GREEN}Summary Output:${RESET} $summaryPath\n"

    if [[ -f "$outputFile" ]]; then
        echo -e "${YELLOW}Existing file detected:${RESET} $outputFile"
        read -rp "Overwrite it? (y/N): " confirm
        if [[ ! "$confirm" =~ ^[Yy]$ ]]; then
            index=1
            while [[ -f "$summaryPath/Project_Structure_$index.txt" ]]; do
                ((index++))
            done
            outputFile="$summaryPath/Project_Structure_$index.txt"
            echo -e "${BLUE}Saving as new file:${RESET} $outputFile"
        else
            echo -e "${BLUE}Overwriting existing file...${RESET}"
        fi
    fi

    show_menu
    echo ""
    read -rp "Enter your choice: " choice

    case "$choice" in
        0)
            echo "Exiting..."
            exit 0
            ;;
        1)
            generate_map "web_only"
            ;;
        2)
            generate_map "all"
            ;;
        3)
            generate_map "assets_only"
            ;;
        *)
            echo -e "${RED}Invalid choice.${RESET}"
            exit 1
            ;;
    esac
}

main "$@"