## musixmatch

This module will help you to get API response from website https://www.musixmatch.com/

examples
```javascript
const mx = require('musixmatchlyrics')

mx.tracks('adele', songs =>  {
    console.log(songs)
})
```
---
```javascript
const mx = require('musixmatchlyrics')

mx.autocomplete('Rolling in the Deep', songs =>  {
    console.log(songs)
})
```
---
```javascript
const mx = require('musixmatchlyrics')

mx.search('Rolling in the Deep', songs =>  {
    console.log(songs)
})
```
---
```javascript
mx.search('Rolling in the Deep', songs =>  {
    mx.get(songs[0].url, lyric =>  {
        console.log(lyric)
    })
})
```
