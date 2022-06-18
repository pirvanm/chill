export default async (context, locale) => {
  return await Promise.resolve({
    home: "Home",
    videos: "Videos",
    playlists: "playlists",
    history: "history",
    contact: "contact",
  });
};
