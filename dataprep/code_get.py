import os
import io
import zipfile
import requests
import pandas as pd

api_endpoint = "https://www.kaggle.com/api/v1/datasets/download/ayushtankha/70k-job-applicants-data-human-resource"
datafile = "stackoverflow.csv"
datasize = 13000000

df = None
if os.path.exists(datafile) and os.path.getsize(datafile) > datasize:
    print("loading from %s" % datafile)
    df = pd.read_csv(datafile)
else:
    response = requests.get(api_endpoint, stream=True)
    response.raise_for_status()

    with zipfile.ZipFile(io.BytesIO(response.content), "r") as zf:
        filenames = zf.namelist()
        fn = None
        for filename in filenames:
            if ".csv" in filename:
                fn = filename
        if not fn:
            raise Exception("couldn't find csv in zip")
        print("extracting %s from %s" % (fn, api_endpoint))
        with zf.open(fn, "r") as tf:
            csv_text = tf.read().decode("utf-8")
    with open(datafile, "w") as csv:
        csv.write(csv_text)
        csv.flush()
    df = pd.read_csv(io.StringIO(csv_text))

print(df.columns)
