function search(url, that) {
    $.ajax({
        url: url,
        type: "GET",
        data: `value=${that.value}`,
        success: function (response) {
            autoComplete(that, response.data ?? []);

            // $("#suggestion").html(response.data)
            // $("#show-suggestion").append(response.data);
        }, error: function (error) {
            autoComplete(that, []);
        }
    });
}

const autoComplete = (input, arr) => {
    input.addEventListener("input", function (e) {
        let container_list,
            i,
            ul,
            list,
            img,
            val = this.value;

        closeAutoComplete(e);

        // create an element with a class "container_list"
        container_list = document.createElement("div");
        container_list.className = "container_list";
        ul = document.createElement("ul");
        ul.className = "list-group position-absolute";
        container_list.appendChild(ul);
        this.parentNode.appendChild(container_list);

        // when there's no value on the input, remove the list
        if (input.value.trim() === "") {
            container_list.parentNode.removeChild(container_list);
        }

        for (i = 0; i < arr.length; i++) {

            let data_name = arr[i].name;
            let date_id = arr[i].id;

            list = document.createElement("li");
            list.className = "list-group-item list-group-item-action search-list text-truncate cursor-pointer";
            list.id = date_id;
            list.role = 'button';
            list['data-drawer-name'] = data_name;
            list['data-drawer'] = date_id;
            list.innerHTML = data_name;

            img = document.createElement('img');
            img.src = arr[i].icon;
            img.className = "me-1";
            img.width = 25;
            img.height = 25;

            list.prepend(img)

            list.addEventListener("click", function (e) {
                input.value = data_name;
                closeAutoComplete(e);

                myRedirect('/content', 'searchData', arr)

            }, arr, date_id, data_name);

            ul.appendChild(list);
        }
    });
}

// close the list
function closeAutoComplete(element) {
    let a = document.getElementsByClassName("container_list");
    for (let i = 0; i < a.length; i++) {
        a[i].parentNode.removeChild(a[i]);
    }
}

// close the list when you click on the document
document.addEventListener("click", function (e) {
    closeAutoComplete(e.target);
});
