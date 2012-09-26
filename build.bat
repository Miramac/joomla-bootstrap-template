@ECHO OFF

echo new log > build.log

:: Cleanup, copy jobs, concat & minify bootsrap.js
echo building package...
node .\build >> build.log

:: compile bootstrap CSS (could be integrated into the build-script...)
echo compiling bootstrap css...
node .\node_modules\less\bin\lessc .\bootstrap.override\less\bootstrap.less > .\src\css\bootstrap.css
node .\node_modules\less\bin\lessc .\bootstrap.override\less\bootstrap.less > .\src\css\bootstrap.min.css --compress


:: create new zip-ball in bin dir (should be integrated into the build-script!)
echo creating joomla template .ZIP file
.\tools\7-Zip\7z -tzip a .\bin\joomla-bootstrap-template.zip .\src\* >> build.log

pause