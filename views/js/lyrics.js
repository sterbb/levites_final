
$(document).ready(function() {

    $(".searchSong").submit(function(e) {
        e.preventDefault();
        var title = $("#song_title").val();

        document.cookie = "song_title="+title;
        window.location.href = 'songlist';
    });

    $(".getLyrics").click(function(){

        alert("hello");
        var trackID = $(this).attr('trackid');
        alert(trackID);
        document.cookie = "trackID="+trackID;
        window.location.href = 'lyrics';
    })



});

function copyLyrics(button) {
    alert("hello");
    const lyricsSection = button.parentElement;
    const sectionText = lyricsSection.textContent;

    copyToClipboard(sectionText);
    alert('Lyrics copied to clipboard!');
}

function copyToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
}