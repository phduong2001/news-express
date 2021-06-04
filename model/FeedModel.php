<?php
class FeedModel {

    private $db_conn;

    public function __construct() {
        $this->db_conn = new Database();
        $this->db_conn->connect();
    }

    public function get_by_id($id_feed) {
        $select_query = "SELECT * FROM FEED WHERE ID_FEED = $id_feed";
        $result = $this->db_conn->query($select_query);

        return $result;
    }

    public function get_lasts($amount) {
        $size_query = "SELECT * FROM FEED ORDER BY ID_FEED DESC LIMIT $amount";
        $result = $this->db_conn->query($size_query);

        return $result;
    }

    public function insert($data) {
        $insert_query = "INSERT INTO FEED (TITLE, SUMMARY, CONTENT, URL_FIGURE, USERNAME, PUBLISHED_TS, VIEWED_COUNT) " .
                        "VALUES ('" .
                        $data['title'] . "', '" .
                        $data['summary'] . "', '" .
                        $data['content'] . "', '" .
                        $data['url_figure'] . "', '" .
                        $data['username'] . "', " .
                        'NOW()' . ", " .
                        '0);';
        $this->db_conn->query($insert_query);
    }

    public function get_by_user($username) {
        $feed_timeline_query = "SELECT ID_FEED, TITLE, SUMMARY, URL_FIGURE " .
                               "FROM feed " .
                               "WHERE USERNAME = '$username'";
        $result = $this->db_conn->query($feed_timeline_query);

        if ($result->num_rows > 0) {
            $feed_data = array();
            while ($row = $result->fetch_assoc()) {
                $current_post = array(
                    'id_feed' => $row['ID_FEED'],
                    'title' => $row['TITLE'],
                    'summary' => $row['SUMMARY'],
                    'url_figure' => $row['URL_FIGURE']
                );
                array_push($feed_data, $current_post);
            }
            return $feed_data;
        }
        return false;
    }
}