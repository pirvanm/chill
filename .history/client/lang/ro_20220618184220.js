export default async (context, locale) => {
  return await Promise.resolve({
    home: "Acasă",
    videos: "Videoclipuri",
    playlists: "Albume",
    history: "Istoric",
    contact: "Contact",
    my_country: "Tara Mea",
    popular_song: "Cele mai cautate Melodi ",
    top_playlists: "Albume Celebre ",
    filter_by: "Filtreaza dupa:",
    popularity: "Popularitate",
    duration: "Durata"
  });
};
