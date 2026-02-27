@echo off

python "D:\Repository\Crooks-Cart-Collectives\logs\tree-mapper.py"

timeout /t 0 /nobreak >nul

python "D:\Repository\Crooks-Cart-Collectives\logs\content-fetcher.py"

timeout /t 0 /nobreak >nul

exit /b
