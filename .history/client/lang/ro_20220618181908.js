export default async (context, locale) => {
  return await Promise.resolve({
    home: "Acasă",
    videos: "Videoclipuri",
    playlists: "Albume",
    history: "Istoric",
    contact: "Contact",
  });
};
