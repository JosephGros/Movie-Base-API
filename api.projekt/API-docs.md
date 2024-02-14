# Planning phase of REST API

## Order
- [Movies](#movies)
- [Series](#series)
- [Actors](#actors)
- [Genre](#genres)
- [Directors](#directors)
- [Writers](#writers)


## Identify resources

Movies
Series
Genre
Actors
Directors
Writers

## Model URIs

- /movies
- /movies/{id}

- /series
- /series/{id}

- /seasons
- /seasons/{id}

- /episodes
- /episodes/{id}

- /genres
- /genres/{id}

- /actors
- /actors/{id}

- /creators
- /creators/{id}

- /directors
- /directors/{id}

- /writers
- /writers/{id}

## Resource representations


### Movies

```
{
    "ammount": "80",
    "size": "20",
    "index": "0",
    "next": "/movies?index=1&size=20",
    "self":"/movies",
    "movies": [
        {
            "self": "/movies/1",
            "name": "Lord of The Rings: The Fellowship of the Ring",
            "poster":"../images/LOTR1.jfif",
            "release": "2001",
            "length": "2h 58m",
            "genres": [
                {
                    "self": "/genres/1,
                    "name": "Action"
                },
                {
                    "self": "/genres/2,
                    "name": "Adventure"
                },
                {
                    "self": "/genres/3,
                    "name": "Drama"
                },
            ],
            "description": "A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.",
            "actors": [
                {
                    "self": "/actors/1,
                    "name": "Elijah Wood",
                    "role": "Frodo"
                },
                {
                    "self": "/actors/2,
                    "name": "Ian McKellan",
                    "role": "Gandalf"
                },
                {
                    "self": "/actors/3,
                    "name": "Viggo Mortensen",
                    "role": "Aragorn"
                },
                {
                    "self": "/actors/4,
                    "name": "Orlando Bloom",
                    "role": "Legolas"
                },
                {
                    "self": "/actors/5,
                    "name": "Sean Astin",
                    "role": "Sam"
                },
                {
                    "self": "/actors/6,
                    "name": "Billy Boyd",
                    "role": "Pipppin"
                },
                {
                    "self": "/actors/7,
                    "name": "Sean Bean",
                    "role": "Boromir"
                },
                {
                    "self": "/actors/8,
                    "name": "Andy Serkis",
                    "role": "Gollum"
                },
                {
                    "self": "/actors/9,
                    "name": "Ian Holm",
                    "role": "Bilbo"
                },
                {
                    "self": "/actors/10,
                    "name": "Christopher Lee",
                    "role": "Saruman"
                },{
                    "self": "/actors/11,
                    "name": "Dominic Monoghan",
                    "role": "Merry"
                },
                {
                    "self": "/actors/12,
                    "name": "John Rhys-Davies",
                    "role": "Gimli"
                },
                {
                    "self": "/actors/13,
                    "name": "Liv Tyler",
                    "role": "Arwen"
                },
                {
                    "self": "/actors/14,
                    "name": "Cate Blanchett",
                    "role": "Galadriel"
                },
                {
                    "self": "/actors/15,
                    "name": "Hugo Weaving",
                    "role": "Elrond"
                },
            ],
            "directors": [
                {
                    "self": "/directors/1,
                    "name": "Peter Jackson",
                },,
            ],
            "writers": [
                {
                    "self": "/writers/1,
                    "name": "J.R.R. Tolkien",
                },
                {
                    "self": "/writers/2,
                    "name": "Fran Walsh",
                },
                {
                    "self": "/writers/3,
                    "name": "Philippa Boyens",
                },
            ],
        }
        {
            ...
        },
    ]
}
```

### Series

```
{
    "ammount": "80",
    "size": "20",
    "index": "0",
    "next": "/series?index=1&size=20",
    "self":"/series",
    "series": [
        {
            "self": "/series/1",
            "name": "Sons of Anarchy",
            "poster":"../images/SOA.jpg",
            "release": "2008-2014",
            "length": "45m",
            "genres": [
                {
                    "self": "/genres/4",
                    "name": "Crime"
                },
                {
                    "self": "/genres/3",
                    "name": "Drama"
                },
                {
                    "self": "/genres/5",
                    "name": "Thriller"
                },
            ]
            "seasons": [
                {
                    "self": "/series/1/seasons/1",
                    "name": "Season 1",
                    "number_of_episodes": "13",
                    "episodes": [
                        {
                            "self": "/series/1/seasons/1/episodes/1",
                            "episode_count": "E1",
                            "name": "Pilot",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/2",
                            "episode_count": "E2",
                            "name": "Seeds",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/3",
                            "episode_count": "E3",
                            "name": "Fun Town",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/4",
                            "episode_count": "E4",
                            "name": "Patch Over",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/5",
                            "episode_count": "E5",
                            "name": "Giving Back",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/6",
                            "episode_count": "E6",
                            "name": "AK-51",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/7",
                            "episode_count": "E7",
                            "name": "Old Bones",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/8",
                            "episode_count": "E8",
                            "name": "The Pull",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/9",
                            "episode_count": "E9",
                            "name": "Hell Followed",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/10",
                            "episode_count": "E10",
                            "name": "Better Half",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/11",
                            "episode_count": "E11",
                            "name": "Capybara",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/12",
                            "episode_count": "E12",
                            "name": "The Sleep of Babies",
                        },
                        {
                            "self": "/series/1/seasons/1/episodes/13",
                            "episode_count": "E13",
                            "name": "The Revelator",
                        },
                    ]
                },
                {
                    "self": "/series/1/seasons/2",
                    "name": "Season 2"
                },
                {
                    "self": "/series/1/seasons/3",
                    "name": "Season 3"
                },
                {
                    "self": "/series/1/seasons/1",
                    "name": "Season 4"
                },
                {
                    "self": "/series/1/seasons/2",
                    "name": "Season 5"
                },
                {
                    "self": "/series/1/seasons/3",
                    "name": "Season 6"
                },
                {
                    "self": "/series/1/seasons/3",
                    "name": "Season 7"
                },
            ],
            "description": "A biker struggles to balance being a father and being involved in an outlaw motorcycle club.",
            "actors": [
                {
                    "self": "/actors/17",
                    "name": "Charlie Hunnam",
                    "role": "Jackson 'Jax' Teller",
                    "episodes": "92",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/18",
                    "name": "Katey Sagal",
                    "role": "Gemma Teller Morrow",
                    "episodes": "92",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/19",
                    "name": "Mark Boone Junior",
                    "role": "Robert 'Bobby Elvis' Munson",
                    "episodes": "92",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/20",
                    "name": "Kim Coates",
                    "role": "Alexander 'Tig' Trager",
                    "episodes": "92",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/21",
                    "name": "Tommy Flanagan",
                    "role": "Filip 'Chibs' Telford",
                    "episodes": "92",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/22",
                    "name": "Theo Rossi",
                    "role": "Juan Carlos 'Juice' Ortiz",
                    "episodes": "89",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/23",
                    "name": "Dayton Callie",
                    "role": "Wayne Unser",
                    "episodes": "88",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/24",
                    "name": "Maggie Siff",
                    "role": "Dr. Tara Knowles",
                    "episodes": "79",
                    "years": "2008-2013",
                },
                {
                    "self": "/actors/25",
                    "name": "Ron Perlman",
                    "role": "Clarence 'Clay' Morrow",
                    "episodes": "79",
                    "years": "2008-2013",
                },
                {
                    "self": "/actors/26",
                    "name": "David Labrava",
                    "role": "Happy Lowman",
                    "episodes": "71",
                    "years": "2008-2014",
                },{
                    "self": "/actors/27",
                    "name": "Ryan Hurst",
                    "role": "Harry 'Opie' Winston",
                    "episodes": "54",
                    "years": "2008-2012",
                },
                {
                    "self": "/actors/28",
                    "name": "William Lucking",
                    "role": "Piermont 'Piney' Winston",
                    "episodes": "49",
                    "years": "2008-2011",
                },
                {
                    "self": "/actors/29",
                    "name": "Winter Ave Zoli",
                    "role": "Lyla Winston",
                    "episodes": "41",
                    "years": "2009-2014",
                },
                {
                    "self": "/actors/29",
                    "name": "Jimmy Smits",
                    "role": "Nero Padilla",
                    "episodes": "38",
                    "years": "2012-2014",
                },
                {
                    "self": "/actors/30",
                    "name": "Drea de Matteo",
                    "role": "Wendy Case",
                    "episodes": "35",
                    "years": "2008-2014",
                },
                {
                    "self": "/actors/31",
                    "name": "Kurt Sutter",
                    "role": "Otto 'Big Otto' Delaney",
                    "episodes": "20",
                    "years": "2008-2013",
                },
            ],
            "creators": [
                {
                    "self": "/creators/1",
                    "name": "Kurt Sutter",
                },
            ],
        }
        {
            ...
        },
    ]
}
```

### Actors

```
{
    "ammount": "80",
    "size": "20",
    "index": "0",
    "next": "/actors?index=1&size=20",
    "self":"/actors",
    "actors": [
        {
            "self": "/actors/1",
            "name": "Elijah Wood",
            "movies": [
                {
                    "self": "/movies/1",
                    "name": "Lord of The Rings: The Fellowship of the Ring",
                    "role": "Frodo"
                },
                {
                    "self": "/movies/2",
                    "name": "Lord of The Rings: The Two Towers",
                    "role": "Frodo"
                },
                {
                    "self": "/movies/3",
                    "name": "Lord of The Rings: The Return of the King",
                    "role": "Frodo"
                },
                    ]
                },
        {
            ...  
        },
    ]
}
```

### Genre 

```
{
    "ammount": "30",
    "size": "10",
    "index": "0",
    "next": "/genres?index=1&size=20",
    "self":"/genres",
    "genres": [
        {
            "self": "/genres/1",
            "name": "Action",
            "movies": [
                {
                    "self": "/movies/1",
                    "name": "Lord of The Rings: The Fellowship of the Ring"
                },
                {
                    "self": "/movies/2",
                    "name": "Lord of The Rings: The Two Towers"
                },
                {
                    "self": "/movies/3",
                    "name": "Lord of The Rings: The Return of the King"
                },
            ]
        },
        {
            ...
        },
    ]
}
```

### Directors

```
{
    "ammount": "80",
    "size": "20",
    "index": "0",
    "next": "/directors?index=1&size=20",
    "self":"/directors",
    "directors": [
        {
            "self": "/directors/1",
            "name": "Peter Jackson",
            "movies": [
                {
                    "self": "/movies/1",
                    "name": "Lord of The Rings: The Fellowship of the Ring"
                },
                {
                    "self": "/movies/2",
                    "name": "Lord of The Rings: The Two Towers"
                },
                {
                    "self": "/movies/3",
                    "name": "Lord of The Rings: The Return of the King"
                },
            ]
        },
        {
            ...
        },
    ]
}
```

### Writers

```
{
    "ammount": "80",
    "size": "20",
    "index": "0",
    "next": "/writers?index=1&size=20",
    "self":"/writers",
    "writers": [
        {
            "self": "/writers/1",
            "name": "J.R.R. Tolkien",
            "movies": [
                {
                    "self": "/movies/1",
                    "name": "Lord of The Rings: The Fellowship of the Ring"
                },
                {
                    "self": "/movies/2",
                    "name": "Lord of The Rings: The Two Towers"
                },
                {
                    "self": "/movies/3",
                    "name": "Lord of The Rings: The Return of the King"
                },
            ]
        },
        {
            ...
        },
    ]
}