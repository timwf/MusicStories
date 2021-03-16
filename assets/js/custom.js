jQuery(document).ready(function () {
    jQuery(".story-filter__sec .story-filter .clickable_filter_item").on("click", function () {
        filter_story_list();

    })

    jQuery(".story-btn-bar .btn_load_more").on("click", function () {
        var story_cat_array = [];
        jQuery(".story-filter__sec .story-filter .sub-filter .active-item .clickable_filter_item").each(function () {
            var dId = jQuery(this).attr("data-id");
            story_cat_array.push(dId);
            
        })
        filterPost("loadmore", story_cat_array)
    })
   
    jQuery(".filter_all").on("click", function () {
        var story_cat_array = [];
        jQuery(".story-filter__sec .story-filter .sub-filter .active-item").removeClass("active-item");
        filterPost("filter", story_cat_array)
    })
})

function filter_story_list() {
    var story_cat_array = [];
    jQuery(".story-filter__sec .story-filter .sub-filter .active-item .clickable_filter_item").each(function () {
        var dId = jQuery(this).attr("data-id");
        story_cat_array.push(dId);
        console.log(story_cat_array);
    })
    filterPost("filter", story_cat_array)
}

function filterPost(type, catId) {
    var currentPostCount = jQuery(".storylist-grid > div").length;;

    jsonObj = {
        "action": "filter_data",
        "category_id": catId,
        "postperpage": parseInt(perpage),
        "currentPostCount": currentPostCount,
        "type": type
    };
    if (type == "loadmore") {
        paged = paged + 1;
        jsonObj['paged'] = paged;
    } else {
        paged = 1;
    }
    // console.log(jsonObj);

    jQuery.ajax({
        url: ajax_call_url,
        data: jsonObj, // form data
        type: "POST", // POST
        async: false,
        beforeSend: function (xhr) {
            console.log("ajax start"); // changing the button label
        },
        success: function (data) {
            // console.log(data.data);

            if (data.data.replace(/(\r\n\t|\n|\r\t)/gm, "").replace(" ", "") == "false" && type != 'loadmore') {
                jQuery(".storylist-grid").html("<div class='no_found'>Result not found!!</div>");
                jQuery(".storylist-grid").show();
                return false;
            } else if (type == 'loadmore') {
                // jQuery('.load_more_img').hide();
                jQuery(".storylist-grid").show();
                jQuery(".storylist-grid").append(data.data);
                AOS.refreshHard();
            } else {
                jQuery(".storylist-grid").html("");
                jQuery(".storylist-grid").html(data.data);
                AOS.refreshHard();
                jQuery(".storylist-grid").show();
            }

            setTimeout(function () {
                var total = jQuery("#total_post_count").val();
                var current = jQuery("#current_post_count").val();

                var c_total = jQuery(".storylist-grid > div").length;

                if (total != '' && current != '') {
                    if (parseInt(total) == c_total) {
                        jQuery(".story-btn-loadmore-bar").hide();
                    } else {
                        jQuery(".story-btn-loadmore-bar").show();
                    }
                }
                jQuery("#total_post_count").remove();
                jQuery("#current_post_count").remove();
            }, 1000);
        },
        error: function (xhr) {
            jQuery('.load_more_img').hide();
            jQuery(".storylist-grid").show();
            console.log(xhr);
        }
    });
}