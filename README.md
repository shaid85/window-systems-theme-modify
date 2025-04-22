## Importants points to remember

- make to run this command before see the tailwind style

**Setup commands**

npm init -y
npm install tailwindcss@3.4.17
npx tailwindcss init

**build commands**

`npx tailwindcss -i ./assets/css/tailwind.css -o ./dist/output.css --watch`

> Note - with watch argument, track the file change and make build live, don't need to re-run build command

## Must follow guideline

- use svg icons
- use global constant to include/require that defined in functions
- proper icons function naming
- use class-object if possible
-

## Before theme installation

- build tailwind
- exclude node_modules and upload zip to website

## CPT Related information
 
- archive to display all main category that has no parent -> archive-produkcitja.php
- display sub-categories of taxonom-produkcija_category.php that has parent if not parent then we will displaying all his posts
- single-produkcija.php => display single post
