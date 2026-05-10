const urlParams = new URLSearchParams(window.location.search);
    const songID = urlParams.get('songID');

    function to_json(text) {
        const parts = split("~|~");
        if (parts.length % 2 != 0) {
            return text;
        };
        const data = {};
        for (let i = 0; i < parts.length; i += 2) {
            data[parts[i]] = parts[i + 1];
        }
    }
    const res = ""
    fetch("https://www.boomlings.com/database/getGJSongInfo.php", {
        method: "POST",
        body: JSON.stringify({
            secret: "Wmfd2893gb7",
            songID: songID
        }),
        headers: {
            'user-agent': '', 
            'Content-Type': 'application/x-www-form-urlencoded'
        },
    }).then((response) => {res = response})