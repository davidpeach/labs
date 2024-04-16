# Labs

## Scrobble Importer

### Models

maybe extra models for internal normalizations - same songs but different editions.

#### Song
- id
- title
- artist_id
- description
- length
- mbid

#### Artist
- id
- name
- description
- mbid

#### Album
- id
- title
- description
- release_date
- mbid

#### AlbumArtist
An album can be created by multiple artists.
- id
- album_id
- artist_id
- role (writer, performer)

#### AlbumSong
The same song can appear on multiple albums.
- id
- album_id
- song_id
- position

#### Listen
- id
- song_id / album_song_id
- listened_at

