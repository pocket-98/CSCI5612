import pandas as pd

def get_skills(df):
    skills_df = df["HaveWorkedWith"]
    skills_count = dict()
    for transaction in skills_df:
        if type(transaction) == str:
            for sk in transaction.split(";"):
                if sk in skills_count:
                    skills_count[sk] += 1
                else:
                    skills_count[sk] = 0
    skills = list(skills_count.keys())
    counts = [skills_count[sk] for sk in skills]
    combined_sorted = list(sorted(zip(counts, skills)))[::-1]
    counts, skills = zip(*combined_sorted)
    print("skills (%d):" % len(skills))
    print(skills)

    data = dict()
    for sk in skills:
        data[sk] = list()
    for transaction in skills_df:
        if type(transaction) == str:
            this_guys_skills = transaction.split(";")
            for sk in skills:
                if sk in this_guys_skills:
                    data[sk].append(True)
                else:
                    data[sk].append(False)
    return pd.DataFrame(data)

if __name__ == "__main__":
    datafile = "../../dataprep/stackoverflow.csv"
    df = pd.read_csv(datafile, index_col=0)
    skills_df = get_skills(df)
    print(skills_df)
    skills_df.to_csv("stackoverflow_skills.csv")
