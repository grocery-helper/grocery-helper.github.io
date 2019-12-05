#import the required packages
import datetime as date
import json
import os

#invoke the osascript to fire your notification locally.
def notify(title, text):
    os.system("""
              osascript -e 'display notification "{}" with title "{}"'
              """.format(text, title))

#open your json file
#make sure your specify the full path
with open('/Users/tanyasonker/Documents/grocery-helper/dates.json') as data_file:
    data = json.load(data_file)

#array to add items from categories database
items = []
#today's date
today = date.datetime.today()

#loop overs your data and find the items that are about to expire today
# and adds them to your list
for x in data:
    bday = date.datetime.strptime(x['date'], "%Y%m%d").date()
    if bday.day==today.day and bday.month==today.month:
        items.append(x['name'])

#create a string from list by join method
msg = "\n".join(items)

#fire your notification :)
if msg != "":
    notify("Item Expiring Today",msg)