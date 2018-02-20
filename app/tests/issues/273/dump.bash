echo "select id, year, cooperate_no, researcher_no, personal_no from donations  order by id" | mysql -u $DBU --password=$DBP $DBN
