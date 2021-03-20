// function to get date
function pad2(n) {
    return (n < 10 ? '0' : '') + n;
}

// format date
function getDate() {
    var date = new Date();
    var month = pad2(date.getMonth() + 1);//months (0-11)
    var day = pad2(date.getDate());//day (1-31)
    var year = date.getFullYear();

    var formattedDate = year + "-" + month + "-" + day;

    return formattedDate
}

// edit post
function editPost(id) {
    $("#" + id + " .non-edit-buttons").css("display","none");
    $("#" + id + " .post-edit-buttons").css("display","flex");
}

// save editing
function saveEdit(id) {
    $("#" + id + " .non-edit-buttons").css("display","block");
    $("#" + id + " .post-edit-buttons").css("display","none");

    let text = $("#" + id + "-news-text").val()

    $.ajax({
        type: "POST",
        url: 'action_update_post.php',
        data: {
            title: $("#" + id + "-news-title").val(),
            // category: document.getElementById(id + "-news-category").value,
            text: text,
        },
        success: function (response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData)

            // update data on feed
            $("#" + id + " .news-item-text").html(text);
        }
    });
}

// function to post news on backend
function postNews() {
    let producer = document.getElementById("news-producer").value
    let title = document.getElementById("news-title").value
    let category = document.getElementById("news-category").value
    let text = document.getElementById("news-text").value
    let date = getDate()

    $.ajax({
        type: "POST",
        url: 'action_post_news.php',
        data: {
            producer: producer,
            title: title,
            category: category,
            text: text,
            date: date
        },
        success: function () {
            // clear GUI
            document.getElementById("news-producer").value = ""
            document.getElementById("news-title").value = ""
            document.getElementById("news-category").value = ""
            document.getElementById("news-text").value = ""

            // append to news feed
            let data = '<div class="news-item">' +
                '<p class="news-item-title">' + title + '</p>' +
                '<p class="news-item-category">Category: ' + category + '</p>' +
                '<p class="news-item-author">Posted by: <i>' + producer + '</i></p>' +
                '<p class="news-item-date">Date: ' + date + '</p>' +
                '<p class="news-item-text">' + text + '</p>' +
                '</div>'
            $("#news-scrollfeed").prepend(data);
        }
    });
}

// filter categories
function chooseCategory(category) {
    // remove focus
    document.getElementById("category-all").classList.add('button-disabled')
    document.getElementById("category-cars").classList.add('button-disabled')
    document.getElementById("category-stock").classList.add('button-disabled')
    document.getElementById("category-solar-energy").classList.add('button-disabled')

    document.getElementById("category-all").classList.remove('button-shadow')
    document.getElementById("category-cars").classList.remove('button-shadow')
    document.getElementById("category-stock").classList.remove('button-shadow')
    document.getElementById("category-solar-energy").classList.remove('button-shadow')

    // add focus
    document.getElementById("category-" + category).classList.add('button-shadow')
    document.getElementById("category-" + category).classList.remove('button-disabled')

    // FILTER NEWS

    // first remove news content
    document.getElementById("news-scrollfeed").innerHTML = ""

    // query for new and specific content
    let filter = category.replace('-', ' ')
    $.ajax({
        type: "POST",
        url: 'action_filter.php',
        data: {
            filter: filter,
            from: document.getElementById("from-date").value,
            to: document.getElementById("to-date").value
        },
        success: function (response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData)

            let posts = jsonData.data
            let data = ''

            // append to news feed
            for (let i = 0; i < posts.length; i++) {
                const el = posts[i];

                const post = 
                '<div id="' + i + '" class="news-item">' + 
                    '<span class="non-edit-buttons">' +
                        '<p class="news-item-title">' + el['title'] + '</p>' +
                        '<p class="news-item-category">Category: ' + el['category'] + '</p>' +
                        '<p class="news-item-author">Posted by: <i>' + el['producer'] + '</i></p>' +
                        '<p class="news-item-date">Date: ' + el['date'] + '</p>' +
                        '<p class="news-item-text">' + el['text'] + '</p>' +
                        '<button class="switch-btn form-btn edit-btn" onclick="editPost(' + i + ')">Edit</button>' + 
                    '</span>' + 
                    '<div class="post-edit-buttons">' + 
                        '<p class="slide-title">Edit mode</p>' + 
                        '<p class="news-item-title" style="margin-bottom:2vh">' + el['title'] + '</p>' + 
                        '<input id="' + i + '-news-title" class="article-input" type="hidden" value="'+ el['title'] + '" />' + 
                        '<textarea id="' + i + '-news-text" placeholder="Write your text here..">' + el['text'] + '</textarea>' + 
                        '<button class="switch-btn form-btn edit-btn" onclick="saveEdit(' + i + ')">Save</button>' + 
                    '</div>' +
                '</div>'

                data += post
            }
            $("#news-scrollfeed").html(data);

            // if user is logged in, enable him to edit
            if (document.getElementById("user-details").innerText)
            
            // enabling edit
            $(".edit-btn").css("display","block");
        }
    });
}