import pandas as pd
from sklearn.preprocessing import StandardScaler

def get_quant_cols(df):
    df2 = df.drop(columns=["Age", "EdLevel", "Gender", "MentalHealth", "MainBranch", "Country", "Employed"])
    return df2

def get_scaled_df(df, col_tail="S"):
    scaler = StandardScaler()
    scaled = scaler.fit_transform(df)
    df_scaled = pd.DataFrame({df.columns[j]+col_tail: scaled[:,j] for j in range(scaled.shape[1])})
    return df_scaled

if __name__ == "__main__":
    datafile = "../../dataprep/stackoverflow_clean.csv"
    df = pd.read_csv(datafile, index_col=0)
    quant_df = get_quant_cols(df)
    print(quant_df.describe())
    scaled_df = get_scaled_df(quant_df)
    print(scaled_df)
    scaled_df.to_csv("stackoverflow_quant.csv")
