@echo off

python "D:\Application Program\Xampp\htdocs\Crooks-Cart-Collectives\logs\tree-mapper.py"

timeout /t 2 /nobreak >nul

python "D:\Application Program\Xampp\htdocs\Crooks-Cart-Collectives\logs\content-fetcher.py"

timeout /t 2 /nobreak >nul

exit /b
