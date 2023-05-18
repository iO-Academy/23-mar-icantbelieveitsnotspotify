# Set-up instructions

## Front-end set-up:
* Go to github.com/iO-Academy
* Find the repository "music-player-fe" and clone it to your local device
* Navigate into the "music-player-fe" directory in the terminal
* Switch to story 1 branch by running "git checkout story-1" in the terminal
* Find the "src" file and go into "settings.js"
* Edit line 1 of the file so that it says: `const BASE_URL = 'http://localhost:1234/23-mar-icantbelieveitsnotspotify/'`
* Run "npm install", "npm start" commands in the terminal to get the front-end app running on http://localhost:3000

## Back-end set-up:
* Clone the repository "23-mar-icantbelieveitsnotspotify" into your local device (also on github.com/iO-Academy).
* Create an SQL database and name it "musciplayer"
* In the "db" folder open "music.sql" and run all SQL commands to populate the database
* Navigate into the "23-mar-icantbelieveitsnotspotify" directory in the terminal
* Run "composer install" command

## Testing the product:
* To test the different stories make sure you are in that story branch in both "music-player-fe" and "23-mar-icantbelieveitsnotspotify" directories (story 2 branch named "story-2", story 3 branch named "story-3", etc.)
* Clear "musicplayer" database and re-run SQL commands if data is not displaying front-end



# music-player-api-template

## API documentation

### Return all artists

* **URL**

  /artists.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  There are no required URL params


  **Optional:**
  
  There are no optional URL params


* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

```json
{
  "artists": [
    {
      "name": "Billie Eilish",
      "albums": [
        {
          "name": "When We All Fall Asleep, Where Do We Go?",
          "songs": [
            "bad guy",
            "bury a friend",
            "you should see me in a crown"
          ],
          "artwork_url": "https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees"
        },
        {
          "name": "Happier Than Ever",
          "songs": [
            "NDA",
            "Therefore I Am",
            "Happier Than Ever"
          ],
          "artwork_url": "https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees"
        }
      ]
    }
  ]
}
```

* **Error Response:**

  * **Code:** 500 SERVER ERROR <br />
    **Content:** `{"message": "Unexpected error"}`


### Return specific artist

* **URL**

  /artist.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  `name=string`

  **Optional:**

  There are no optional URL params

  **Example:**

  `/artist.php?name=Billie Eilish`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

```json
{
  "name": "Billie Eilish",
  "albums": [
    {
      "name": "When We All Fall Asleep, Where Do We Go?",
      "songs": [
        {
          "name": "bad guy",
          "length": "3:28"
        },
        {
          "name": "bury a friend",
          "length": "3:28"
        },
        {
          "name": "you should see me in a crown",
          "length": "3:28"
        }
      ],
      "artwork_url": "https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees"
    }
  ]
}
```

* **Error Response:**

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Unknown artist name"}`

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error"}`


### Return popular albums

* **URL**

  /popularAlbums.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  There are no required URL params

  **Optional:**

  There are no optional URL params

  **Example:**

  `/popularAlbums.php

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** <br />

```json
[
  {
    "artist": "Billie Eilish",
    "name": "When We All Fall Asleep, Where Do We Go?",
    "songs": [
      "bad guy",
      "bury a friend",
      "you should see me in a crown"
    ],
    "artwork_url": "https://via.placeholder.com/50x50/386641/6A994E?text=The+Memory+of+Trees"
  }    ,
  {
    "artist": "Taylor Swift",
    "name": "Lover",
    "songs": [
      "ME!",
      "You Need To Calm Down",
      "Lover"
    ],
    "artwork_url": "https://via.placeholder.com/50x50/386641/6A994E?text=The+Memory+of+Trees"
  },
  {
    "artist": "Ed Sheeran",
    "name": "÷",
    "songs": [
      "Shape of You",
      "Castle on the Hill",
      "Galway Girl"
    ],
    "artwork_url": "https://via.placeholder.com/50x50/386641/6A994E?text=The+Memory+of+Trees"
  }
]
```

* **Error Response:**

  * **Code:** 500 SERVER ERROR <br />
    **Content:** `{"message": "Unexpected error"}`

### Mark a song as recently played

* **URL**

  /songPlayed.php

* **Method:**

  `POST`

* **URL Params**

  **Required:**

  There are no required URL params

  **Optional:**

  There are no optional URL params

* **Body Data**

  Must be sent as JSON with the correct headers

  **Required:**

    ```json
    {
      "name": "String",
      "artist": "String"
    }
    ```

  **Example:**

  `/songPlayed.php`

* **Success Response:**

    * **Code:** 201 CREATED <br />
      **Content:** <br />

  ```json
  {"message": "Successfully recorded play."}
  ```

* **Error Response:**

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid song data", "data": []}`

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`


### Return recently played songs

* **URL**

  /recentSongs.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  There are no required URL params

  **Optional:**

  There are no optional URL params

  **Example:**

  `/recentSongs.php

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** <br />

```json
[
  {
    "name": "Song title 1",
    "artist": "Artist 1",
    "length": "3:28",
    "artwork_url": "https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees"
  },
  {
    "name": "Song title 2",
    "artist": "Artist 2",
    "length": "3:28",
    "artwork_url": "https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees"
  },
  {
    "name": "Song title 3",
    "artist": "Artist 3",
    "length": "3:28",
    "artwork_url": "https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees"
  }
]
```

* **Error Response:**

  * **Code:** 500 SERVER ERROR <br />
    **Content:** `{"message": "Unexpected error"}`
