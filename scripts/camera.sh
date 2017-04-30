!/bin/bash
# Every day, a new directory is made for the day's files.  This makes it go in the correct day
DATE=$(date +"%Y-%m-%d")
TIME=$(date +"%H:%M")
# Make a directory for the minute in the day's directory
sudo mkdir /var/www/html/camera/"$DATE"/"$TIME"
# In other words, for 57 seconds
first=$(date +"%M")
last=$(date +"%M")
while (( "$last" <= "$first" ))
do
        # Set the variable for what the image will be called
        MINUTE=$(date +"%M:%S")
        # Take the image.  Do a verticle and horizontal flip, quality of 10 save it to the correct place, focu$
        sudo raspistill -n -vf -hf -q 10 -o /var/www/html/camera/"$DATE"/"$TIME"/"$MINUTE".jpg --timeout 1
        # Copy it to the live file
        sudo cp /var/www/html/camera/"$DATE"/"$TIME"/"$MINUTE".jpg /var/www/html/camera/live/image.jpg
        sleep 5s
        last=$(date +"%M")
done


