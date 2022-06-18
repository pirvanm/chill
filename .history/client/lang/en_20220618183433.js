export default async (context, locale) => {
  return await Promise.resolve({
    home: "Home",
    videos: "Videos",
    playlists: "playlists",
    history: "history",
    contact: "contact",
    popular_song: "Popular songs",
    top_playlists: "Top Playlist"

  });
};
