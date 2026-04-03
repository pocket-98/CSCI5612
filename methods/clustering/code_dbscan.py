import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.cluster import DBSCAN
from sklearn.metrics import silhouette_score

def plot_scatter(X, labels, title="scatter", output_png="output.png"):
    fig = plt.figure(figsize=(8,6))
    mins = list(min(X[:,j]) for j in range(3))
    maxs = list(max(X[:,j]) for j in range(3))
    ax = fig.add_subplot(111, projection="3d")
    ax.scatter(X[:,0], X[:,1], X[:,2], c=labels, marker=".", cmap="Paired")
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
    plt.title("DBSCAN K vs Silhouette Score")
    plt.savefig(output_png)

if __name__ == "__main__":
    df = pd.read_csv("stackoverflow_pca.csv", index_col=0)
    X = df.to_numpy()
    X_sample = X[np.random.choice(a=np.arange(X.shape[0]), size=X.shape[0]//20, replace=False)]
    silhouettes = dict()
    for eps in [0.6, 0.5, 0.4, 0.3]:
        dbscanner = DBSCAN(eps=eps)
        model = dbscanner.fit(X_sample)
        labels = model.labels_
        k = len(set(labels))
        silhouette = silhouette_score(X_sample, labels)
        silhouettes[k] = silhouette
        print("eps = %.3f -> k = %d" % (eps, k))
        print("  silhouette: %.3f" % silhouette)
        plot_scatter(X_sample, labels, "dbscan eps=%.3f k=%d" % (eps, k),"dbscan-eps%.3f.png" % eps)
        print()
    plot_silhouettes(silhouettes, "dbscan-silhouette.png")
