cpuTemp0=$(cat /sys/class/thermal/thermal_zone0/temp)
temp=$((cpuTemp0/1000))
mysql -uroot -p temp <<EOF
INSERT INTO temp (temp, date) values ("$temp", NOW());
EOF


