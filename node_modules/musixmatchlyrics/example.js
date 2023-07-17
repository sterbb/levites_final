const mx = require('./index')

mx.search('Rolling in the Deep', lists =>  {
    mx.get(lists[0].url, songs =>  {
        console.log(songs)
    })
})
