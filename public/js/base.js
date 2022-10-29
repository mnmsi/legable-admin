window.onpopstate = (event) => {
    let state = event.state;
    console.log(`location: ${document.location}, state: ${JSON.stringify(event.state)}`);
    if (state == null || state === '') {
        location.reload()
    } else {
        $("#contents").html(state.data)
    }
};

