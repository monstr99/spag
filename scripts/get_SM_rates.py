#!"C:\Python27\python.exe"
__author__ = "rapid99"

import re
import requests
from bs4 import BeautifulSoup
import json

with open("C:\\xampp\\htdocs\\spag\\json\\SM_url_data.json", 'r') as f:
    datastore = json.load(f)

data = {}

def find_rates():
    for (k) in datastore["product_urls"]:
        request = requests.get(datastore["product_urls"][k])
        content = request.content
        soup = BeautifulSoup(content, "html.parser")
        rates = [r.text for r in soup.find_all("p", {"class": "price_first"})]
        regex = re.compile("\d+")

        data[k] = {}

        for i in rates:
            r = regex.findall(i)
            if r[0] == "1":
                r[0] = "1KG"
            data[k][str(r[0])] = int(r[1])

find_rates()

with open("C:\\xampp\\htdocs\\spag\\json\\SM_todays_rate.json", "w") as json_file:
    json.dump(data, json_file)