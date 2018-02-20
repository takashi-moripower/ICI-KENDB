for i in 2011 2012 2013;  do
  mysql -u $DBU --password=$DBP $DBN < $i.sql;
done
