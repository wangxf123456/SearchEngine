echo "delete"
mysql -u group16 group16 -p  < tbl_delete.sql;
echo "create"
mysql -u group16 group16 -p  < tbl_create.sql;
echo "load img"
mysql -u group16 group16 -p  < load_image.sql;
echo "load category"
mysql -u group16 group16 -p  < load_category.sql;
echo "load infobox"
mysql -u group16 group16 -p  < load_infobox.sql;
echo "counter"
mysql -u group16 group16 -p  < tbl_counter.sql;

