<?php
class SongsM
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
    if (!$this->db->isConnected()) {

      exit("Error! : Could Not Connect To Database!");
    }
  }


  public function getRowCount($searchVal = null)
  {
    if ($searchVal) {
      // $query = "SELECT COUNT(*) FROM songs_taylorswift WHERE (title LIKE :search) OR (album LIKE :search)";
      $query = "SELECT COUNT(*) FROM top_spotify_songs WHERE (title LIKE :search) OR (artist LIKE :search)";
      
      $param = ['search' => '%' . $searchVal . '%'];
    } else {
      // $query = "SELECT COUNT(*) FROM songs_taylorswift";
      $query = "SELECT COUNT(*) FROM top_spotify_songs";
      $param = [];
    }

    if ($this->db->runQuery($query, $param)) {
      $count = $this->db->getResults(DB_SINGLE);
      return $count['COUNT(*)'];
    } else {
      return false;
    }
  }

  public function getRows($data)
  {
    // var_dump($data);
    $sortType = "ASC";
    if ($data['sort_type'] == '1') {
      $sortType = "DESC";
    }

    if ($data['search_val']) {
      // $query = "SELECT id, title, album, artist, released_at FROM songs_taylorswift WHERE (title LIKE :search) OR (album LIKE :search) ORDER BY :ordcol $sortType LIMIT :offset, :rowcon";
      $query = "SELECT id, title, artist, genre, year, dur FROM top_spotify_songs WHERE (title LIKE :search) OR (artist LIKE :search) ORDER BY :ordcol $sortType LIMIT :offset, :rowcon";
      $param = [
        'ordcol' => $data['sort_col'],
        'rowcon' => $data['max_rows'],
        'offset' => $data['row_offset'],
        'search' => '%' . $data['search_val'] . '%'
      ];
    } else {
      // $query = "SELECT id, title, album, artist, released_at FROM songs_taylorswift ORDER BY :ordcol $sortType LIMIT :offset, :rowcon";
      $query = "SELECT id, title, artist, genre, year, dur FROM top_spotify_songs ORDER BY :ordcol $sortType LIMIT :offset, :rowcon";
      $param = [
        'ordcol' => $data['sort_col'],
        'rowcon' => $data['max_rows'],
        'offset' => $data['row_offset'],
      ];
    }

    if ($this->db->runQuery($query, $param)) {
      $rows = $this->db->getResults(DB_MULTIPLE);
      return $rows;
    } else {
      return false;
    }
  }
}
