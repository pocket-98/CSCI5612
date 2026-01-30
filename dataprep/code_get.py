import os
import io
import zipfile
import requests
import pandas as pd

def get_kaggle_data():
    df = None
    api_endpoint = "https://www.kaggle.com/api/v1/datasets/download/ayushtankha/70k-job-applicants-data-human-resource"
    datafile = "stackoverflow.csv"
    datasize = 13000000
    if os.path.exists(datafile) and os.path.getsize(datafile) > datasize:
        print("loading from %s" % datafile)
        df = pd.read_csv(datafile)
    else:
        response = requests.get(api_endpoint, stream=True)
        response.raise_for_status()
        with zipfile.ZipFile(io.BytesIO(response.content), "r") as zf:
            filenames = zf.namelist()
            fname = None
            for filename in filenames:
                if ".csv" in filename:
                    fname = filename
            if not fname:
                raise Exception("couldn't find csv in zip")
            print("extracting %s from %s" % (fname, api_endpoint))
            with zf.open(fname, "r") as tf:
                csv_text = tf.read().decode("utf-8")
        with open(datafile, "w") as csv:
            csv.write(csv_text)
            csv.flush()
        df = pd.read_csv(io.StringIO(csv_text))
    return df

if __name__ == "__main__":
    df = get_kaggle_data()
    print(df.columns)
