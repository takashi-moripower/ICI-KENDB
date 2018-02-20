msgfmt default.po  -o default.mo
rm -rf app/tmp
svn update app
chmod -R 777 app/tmp
