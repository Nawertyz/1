$(document).ready(function () {
    var target = document.querySelector("#card_block");
    $(document).on('change', '\
            input[name="user_id"]:not(.ignore-check), \
            input[name="post_id"]:not(.ignore-check), \
            input[name="id_buff"]:not(.ignore-check), \
            input[name="idfb"]:not(.ignore-check), \
            input[name="video_id"]:not(.ignore-check), \
            input[name="fbid"]:not(.ignore-check), \
            input[name="page_id"]:not(.ignore-check),\
            input[id="object_id"]:not(.ignore-check)\
        ', function() {
        $this = $(this);
        $url = $this.val();
        if ($url.indexOf('instagram') != -1) {
            $this.val(_processInstagram($url));
            return;
        } else if ($url.indexOf('youtube') != -1) {
            $this.val(_processYoutube($url));
            return;
        } else if ($url.indexOf('/stories/') != -1) {
            if ($this.data('ignore-check').indexOf('view_story') == -1) {
                $this.val(_processStoriesFB($url));
            }
            return;
        } else if ($url.indexOf('shopee') != -1 || $url.indexOf('telegram') != -1 || $url.indexOf('t.me') != -1 || $url.indexOf('goo.gl') != -1) {
            return;
        }
        if ($('#url_service').length) {
            $('#url_service').val($this.val());
        }

        if ($this.data('prepare-check')) {
            if ($this.data('prepare-check') == 'full_link') {
                $('[name="extra[full_link]"]').val($url);
            }
        }

        $button = $('button[type="submit"]');
        if ($url.indexOf('http') == -1) {
            checkId($url, $button, $this);
            return false;
        }
        $button.attr('disabled', true);
        // if ($url.indexOf('/permalink/') != -1 || $url.indexOf('/photo') != -1 || $url.indexOf('/media/') != -1 || $url.indexOf('permalink.php') != -1 || $url.indexOf('/videos/') != -1 || $url.indexOf('posts') != -1 || $url.indexOf('story.php') != -1) {
        if ($url.indexOf('/permalink/') != -1 || $url.indexOf('/media/') != -1 || $url.indexOf('permalink.php') != -1 || $url.indexOf('story.php') != -1) {
            var id = $url;
            var result = null;
            var id = $(this).val();
            var post_id = id['match'](/(.*)\/posts\/([0-9]{8,})/);
            // var photo_id = id['match'](/(.*)\/photo.php\?fbid=([0-9]{8,})/);
            // var photo_id2 = id['match'](/(.*)\/photo\/\?fbid=([0-9]{8,})/);
            // var photo_id3 = id['match'](/(.*)\/photo\?fbid=([0-9]{8,})/);

            // var video_id = id['match'](/(.*)\/video.php\?v=([0-9]{8,})/);
            var story_id = id['match'](/(.*)\/story.php\?story_fbid=([0-9]{8,})/);
            var link_id = id['match'](/(.*)\/permalink.php\?story_fbid=([0-9]{8,})/);
            var other_id = id['match'](/(.*)\/([0-9]{8,})/);
            var comment_id = id['match'](/(.*)comment_id=([0-9]{8,})/);
            var album_id = id['match'](/(.*)\/media\/set\/\?set=a\.([0-9]{8,})/);
            if (post_id) {
                result = post_id[2]
            } else {
                if (album_id) {
                    result = album_id[2]
                } else {
                    // if (photo_id) {
                    //     result = photo_id[2]
                    // } else {
                    //     if (photo_id2) {
                    //         result = photo_id2[2]
                    //     } else {
                    //         if (photo_id3) {
                    //             result = photo_id3[2]
                    //         } else {
                                // if (video_id) {
                                    // result = video_id[2]
                                // } else {
                                    if (story_id) {
                                        result = story_id[2]
                                    } else {
                                        if (link_id) {
                                            result = link_id[2]
                                        } else {
                                            if (other_id) {
                                                result = other_id[2]
                                            }
                                        }
                                    }
                                // }
                    //         }
                    //     }
                    // }
                }

            };
            if (comment_id) {
                result += '_' + comment_id[2]
            };
            if (result == null) {
                checkId($url, $button, $this);
            }
            $this.val(result);
            $button.removeAttr('disabled');
        } else {
            checkId($url, $button, $this);
        }
    })
});