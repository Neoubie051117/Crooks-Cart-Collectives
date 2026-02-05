#!/usr/bin/env python3
"""
Web Content Fetcher - Modular file collection for web development
Python version of Content_Fetcher.sh
"""

import os
import sys
import re
import shutil
from pathlib import Path
from datetime import datetime
from typing import List, Dict, Optional, Tuple
import glob

# Text colors for terminal output
class Colors:
    GREEN = '\033[1;32m'
    YELLOW = '\033[1;33m'
    RED = '\033[1;31m'
    BLUE = '\033[1;34m'
    RESET = '\033[0m'

def color_text(text: str, color: str) -> str:
    """Return colored text for terminal output."""
    return f"{color}{text}{Colors.RESET}"

# =============================================================================
# Configuration and Path Setup
# =============================================================================

def setup_paths() -> Tuple[Path, Path, Path, str]:
    """
    Initialize and validate all necessary paths.
    
    Returns:
        Tuple of (script_dir, source_folder, output_folder, main_folder_name)
    """
    # Get script directory
    script_dir = Path(__file__).parent.absolute()
    
    # Configuration directory
    config_dir = script_dir / "content fetch config"
    
    # Parse command line arguments
    if len(sys.argv) > 1:
        source_folder = Path(sys.argv[1]).absolute()
    else:
        source_folder = script_dir
    
    # Determine project root (assumed to be parent of script_dir)
    project_root = script_dir.parent.absolute()
    main_folder_name = project_root.name
    
    # Output folder - defaults to project_root/logs/summary fetch content
    if len(sys.argv) > 2:
        output_folder = Path(sys.argv[2]).absolute()
    else:
        output_folder = project_root / "logs" / "summary fetch content"
    
    # Ensure output folder exists
    output_folder.mkdir(parents=True, exist_ok=True)
    
    return script_dir, source_folder, output_folder, main_folder_name, config_dir

# =============================================================================
# Preset Management
# =============================================================================

def load_presets(config_dir: Path) -> List[Path]:
    """
    Load all preset configuration files from the config directory.
    
    Args:
        config_dir: Path to configuration directory
        
    Returns:
        List of Path objects for each preset file
    """
    if not config_dir.exists() or not config_dir.is_dir():
        print(color_text(f"Error: Config directory not found: {config_dir}", Colors.RED), 
              file=sys.stderr)
        return []
    
    # Find all .py preset files
    preset_files = list(config_dir.glob("*.py"))
    
    if not preset_files:
        print(color_text(f"Error: No .py preset files found in {config_dir}", Colors.RED), 
              file=sys.stderr)
    
    return preset_files

def show_preset_menu(preset_files: List[Path]) -> None:
    """
    Display a menu of available presets.
    
    Args:
        preset_files: List of preset file paths
    """
    if not preset_files:
        print(color_text(f"No preset configurations found in content fetch config", Colors.RED))
        return
    
    print(color_text("Available Presets:", Colors.GREEN))
    print()
    
    for i, preset_path in enumerate(preset_files, 1):
        preset_name = preset_path.stem
        # Replace hyphens with spaces for display
        display_name = preset_name.replace('-', ' ')
        
        print(f"[{i}] {display_name} ({preset_name}.py)")
    
    print()
    print("[0] Exit")
    print()

def get_user_selection(preset_count: int) -> Optional[int]:
    """
    Get user selection from the menu.
    
    Args:
        preset_count: Number of available presets
        
    Returns:
        Selected index (0-based) or None if exit
    """
    while True:
        try:
            selection = input(color_text(f"Select preset [0-{preset_count}]: ", Colors.YELLOW))
            
            if not selection.isdigit():
                raise ValueError("Please enter a number")
            
            selection_int = int(selection)
            
            if selection_int == 0:
                print("Exiting...")
                return None
            elif 1 <= selection_int <= preset_count:
                return selection_int - 1  # Convert to 0-based index
            
            print(color_text(f"Invalid selection. Please enter a number between 0 and {preset_count}.", Colors.RED))
        except ValueError as e:
            print(color_text(f"Invalid input: {e}", Colors.RED))

def load_files_list(preset_file: Path) -> Optional[List[str]]:
    """
    Load the filesToCheck list from a Python preset file.
    
    Args:
        preset_file: Path to the preset Python file
        
    Returns:
        List of file paths or None if error
    """
    if not preset_file.exists():
        print(color_text(f"Error: Preset file not found: {preset_file}", Colors.RED), 
              file=sys.stderr)
        return None
    
    try:
        # Create a namespace to execute the preset file in
        preset_globals = {}
        
        # Execute the preset file
        with open(preset_file, 'r', encoding='utf-8') as f:
            exec(f.read(), preset_globals)
        
        # Extract filesToCheck list
        if 'filesToCheck' not in preset_globals:
            print(color_text(f"Error: filesToCheck list not defined in preset: {preset_file}", Colors.RED),
                  file=sys.stderr)
            return None
        
        files_to_check = preset_globals['filesToCheck']
        
        if not files_to_check:
            print(color_text(f"Error: No files defined in preset: {preset_file}", Colors.RED),
                  file=sys.stderr)
            return None
        
        print(color_text(f"Loaded preset: {preset_file.name} with {len(files_to_check)} files", Colors.GREEN))
        return files_to_check
        
    except Exception as e:
        print(color_text(f"Error loading preset file {preset_file}: {e}", Colors.RED),
              file=sys.stderr)
        return None

# =============================================================================
# File Processing
# =============================================================================

def get_file_header(file_path: Path) -> str:
    """
    Get appropriate header comment for different file types.
    
    Args:
        file_path: Path to the file
        
    Returns:
        Header string for the file type
    """
    suffix = file_path.suffix.lower()
    
    headers = {
        '.html': '<!-- HTML File Content -->',
        '.htm': '<!-- HTML File Content -->',
        '.php': '<?php // PHP File Content ?>',
        '.css': '/* CSS File Content */',
        '.js': '/* JavaScript File Content */',
        '.jsx': '/* JSX File Content */',
        '.ts': '/* TypeScript File Content */',
        '.tsx': '/* TSX File Content */',
        '.py': '# Python File Content',
        '.json': '/* JSON File Content */',
        '.xml': '<!-- XML File Content -->',
        '.md': '<!-- Markdown File Content -->',
        '.txt': '# Text File Content',
    }
    
    return headers.get(suffix, '')

def process_files(
    project_root: Path,
    main_folder_name: str,
    preset_name: str,
    files_to_check: List[str],
    output_folder: Path,
    temp_file: Path,
    final_file: Path
) -> None:
    """
    Process all files and generate the output.
    
    Args:
        project_root: Root directory of the project
        main_folder_name: Name of the main folder
        preset_name: Name of the preset being used
        files_to_check: List of file paths to process
        output_folder: Directory for output files
        temp_file: Temporary file path
        final_file: Final output file path
    """
    try:
        with open(temp_file, 'w', encoding='utf-8') as f:
            # Write header
            f.write(f"Web Project: {main_folder_name}\n")
            f.write(f"Preset: {preset_name}\n")
            f.write(f"Generated: {datetime.now().strftime('%Y-%m-%d %H:%M:%S')}\n\n")
            
            # Process each file
            for relative_path in files_to_check:
                # Determine if path is absolute or relative
                if os.path.isabs(relative_path):
                    full_path = Path(relative_path)
                    display_path = relative_path
                else:
                    full_path = project_root / relative_path
                    display_path = f"{main_folder_name}/{relative_path}"
                
                f.write(f"=== File: {display_path} ===\n\n")
                
                if full_path.exists() and full_path.is_file():
                    f.write("[FOUND]\n\n")
                    
                    # Add file type header
                    header = get_file_header(full_path)
                    if header:
                        f.write(f"{header}\n")
                    
                    # Read and write file content
                    try:
                        with open(full_path, 'r', encoding='utf-8') as content_file:
                            content = content_file.read()
                            f.write(content)
                        
                        # Ensure newline at end if not present
                        if content and not content.endswith('\n'):
                            f.write('\n')
                            
                    except UnicodeDecodeError:
                        # Try with different encoding or binary read
                        try:
                            with open(full_path, 'r', encoding='latin-1') as content_file:
                                content = content_file.read()
                                f.write(content)
                        except:
                            f.write("[ERROR: Could not read file content]\n")
                    except Exception as e:
                        f.write(f"[ERROR reading file: {e}]\n")
                        
                else:
                    f.write("[MISSING]\n")
                
                f.write(f"\n{'=' * 46}\n\n")
    
    except IOError as e:
        print(color_text(f"Error writing to temporary file: {e}", Colors.RED), file=sys.stderr)
        raise
    
    # Handle output saving
    file_index = 0
    if final_file.exists():
        user_choice = input(
            color_text(f"File already exists: {final_file}. Overwrite? (y/N): ", Colors.YELLOW)
        )
        
        if user_choice.lower() == 'y':
            shutil.move(temp_file, final_file)
            print(color_text(f"Overwritten: {final_file}", Colors.GREEN))
        else:
            # Find next available indexed file name
            while (output_folder / f"{preset_name}_Summary-{file_index}.txt").exists():
                file_index += 1
            
            new_file = output_folder / f"{preset_name}_Summary-{file_index}.txt"
            shutil.move(temp_file, new_file)
            print(color_text(f"Saved as: {new_file}", Colors.GREEN))
    else:
        shutil.move(temp_file, final_file)
        print(color_text(f"Saved as: {final_file}", Colors.GREEN))

# =============================================================================
# Main Execution
# =============================================================================

def main() -> None:
    """Main execution function."""
    # Display banner
    print(color_text("File Content Fetcher (Python Version)", Colors.YELLOW))
    print()
    
    # Setup paths
    script_dir, source_folder, output_folder, main_folder_name, config_dir = setup_paths()
    
    # Load presets
    preset_files = load_presets(config_dir)
    
    if not preset_files:
        print(color_text("No presets loaded. Exiting.", Colors.RED))
        sys.exit(1)
    
    # Show menu and get selection
    show_preset_menu(preset_files)
    selected_index = get_user_selection(len(preset_files))
    
    if selected_index is None:
        sys.exit(0)
    
    selected_preset = preset_files[selected_index]
    preset_name = selected_preset.stem
    
    # Load files list from selected preset
    files_to_check = load_files_list(selected_preset)
    
    if files_to_check is None:
        print(color_text("Failed to load files list. Exiting.", Colors.RED))
        sys.exit(1)
    
    # Set up file names
    temp_file = output_folder / "temp_output.txt"
    final_file = output_folder / f"{preset_name}_Summary.txt"
    
    # Cleanup function for temp file
    def cleanup():
        if temp_file.exists():
            try:
                temp_file.unlink()
            except:
                pass
    
    try:
        # Process files
        print(color_text("Processing web files...", Colors.YELLOW))
        
        process_files(
            script_dir.parent,
            main_folder_name,
            preset_name,
            files_to_check,
            output_folder,
            temp_file,
            final_file
        )
        
        print(color_text("Web content fetch completed successfully!", Colors.GREEN))
        
    except Exception as e:
        print(color_text(f"Error during processing: {e}", Colors.RED), file=sys.stderr)
        cleanup()
        sys.exit(1)
    
    finally:
        # Clean up temp file if it still exists
        cleanup()

if __name__ == "__main__":
    main()