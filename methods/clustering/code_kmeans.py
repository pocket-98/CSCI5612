import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.cluster import KMeans
from sklearn.metrics import silhouette_score, silhouette_samples

def plot_scatter(df, labels, title="scatter", output_png="output.png"):
    fig = plt.figure(figsize=(8,6))
    mins = list(min(df["PC%d"%(j+1)]) for j in range(3))
    maxs = list(max(df["PC%d"%(j+1)]) for j in range(3))
    ax = fig.add_subplot(111, projection="3d")
    ax.scatter(df["PC1"], df["PC2"], df["PC3"], c=labels, marker=".", cmap="Paired")
    plt.title(title)
    ax.set_xlabel("PC1")
    ax.set_ylabel("PC2")
    ax.set_zlabel("PC3")
    ax.set_xlim(mins[0]-.1, maxs[0]+.1)
    ax.set_ylim(mins[1]-.1, maxs[1]+.1)
    ax.set_zlim(mins[2]-.1, maxs[2]+.1)
    plt.savefig(output_png)

def plot_silhouettes(silhouettes, output_png="output.png"):
    plt.figure(figsize=(8,6))
    k = list(sorted(silhouettes.keys()))
    s = list(silhouettes[j] for j in k)
    plt.plot(k, s, marker="x")
    plt.xlabel("k")
    plt.ylabel("silhouette score")
    plt.title("K-means K vs Silhouette Score")
    plt.savefig(output_png)

if __name__ == "__main__":
    df = pd.read_csv("stackoverflow_pca.csv", index_col=0)
    X = df.to_numpy()
    silhouettes = dict()
    for k in range(2,6):
        kmeaner = KMeans(n_clusters=k, random_state=10)
        labels = kmeaner.fit_predict(X)
        silhouette = silhouette_score(X[::20], labels[::20])
        silhouettes[k] = silhouette
        print("k = %d" % k)
        print("  silhouette: %.3f" % silhouette)
        plot_scatter(df, labels, "kmeans k=%d" % k,"kmeans-k%d.png" % k)
        print()
    plot_silhouettes(silhouettes, "kmeans-silhouette.png")
