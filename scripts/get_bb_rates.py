#!"C:\Python27\python.exe"
__author__ = "rapid99"

import re
import requests
from bs4 import BeautifulSoup
import json
import time

with open("C:\\xampp\\htdocs\\spag\\json\\bb_url_data.json", 'r') as f:
    datastore = json.load(f)

data = {}


def find_rates():
    for (k) in datastore["product_urls"]:
        request = requests.get(datastore["product_urls"][k])
        content = request.content
        soup = BeautifulSoup(content, "html.parser")
        rates = [r.text for r in soup.find_all("div", {"class": "uiv2-size-variants"})]
        regex = re.compile("\d+")

        data[k] = {}

        for i in rates:
            i = i.replace(" ", "")
            i = i.replace("\n", "")
            r = regex.findall(i)

            if r[0] == "1":
                r[0] = "1KG"

            data[k][str(r[0])] = int(r[1])
        #time.sleep(10)


find_rates()

with open("C:\\xampp\\htdocs\\spag\\json\\bb_todays_rate.json", "w") as json_file:
    json.dump(data, json_file)
