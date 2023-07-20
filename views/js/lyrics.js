const mx = require('musixmatchlyrics')

mx.search('Cruel Summer', lists =>  {
    mx.get(lists[0].url, songs =>  {
        console.log(songs)
    })
})
