#!/usr/bin/env bash

# Run tree-mapper.py
python3 "/home/administrator/Documents/Repository/Crooks-Cart-Collectives/logs/tree-mapper.py"

# Wait for user to press Enter (like pause)
read -p "Press ENTER to continue…"

# Run content-fetcher.py
python3 "/home/administrator/Documents/Repository/Crooks-Cart-Collectives/logs/content-fetcher.py"

# Wait before exiting
read -p "Done. Press ENTER to exit…"