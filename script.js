document.getElementById('loginBtn').addEventListener('click', function() {
    const admin_id = document.getElementById('userId').value;
    const password = document.getElementById('userPassword').value;

    fetch('php/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'admin_id': admin_id,
            'password': password
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.message === 'Login successful') {
            window.location.href = 'home.html'; // Redirect to the home page after successful login
        }
    })
    .catch(error => console.error('Error:', error));
});


document.getElementById('registerBtn').addEventListener('click', function() {
    const admin_id = document.getElementById('registerAdminId').value;
    const password = document.getElementById('registerPassword').value;

    fetch('php/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'admin_id': admin_id,
            'password': password
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.message === 'Registration successful') {
            window.location.href = 'index.html'; // Redirect to login page after successful registration
        }
    })
    .catch(error => console.error('Error:', error));
});


fetch('php/get_songs.php')
    .then(response => response.json())
    .then(songs => {
        const musicListElement = document.getElementById('musicList');
        songs.forEach(song => {
            const li = document.createElement('li');
            li.textContent = `${song.title} by ${song.artist}`;
            musicListElement.appendChild(li);
        });
    })
    .catch(error => console.error('Error:', error));
    const audioPlayer = document.getElementById('audioPlayer');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const musicListElement = document.getElementById('musicList');
    const musicTitle = document.getElementById('musicTitle');
    
    let musicFiles = [];
    let currentTrack = 0;
    
    // Fetch songs from the PHP script
    fetch('php/get_songs.php')
        .then(response => response.json())
        .then(songs => {
            musicFiles = songs;
            populateMusicList(songs);
            loadTrack(currentTrack);
        })
        .catch(error => console.error('Error fetching songs:', error));
    
    // Populate the music list in the player
    function populateMusicList(songs) {
        musicListElement.innerHTML = '';
        songs.forEach((song, index) => {
            const li = document.createElement('li');
            li.textContent = song.replace('.mp3', '');
            li.addEventListener('click', () => {
                currentTrack = index;
                loadTrack(currentTrack);
            });
            musicListElement.appendChild(li);
        });
    }
    
    // Load and play the selected track
    function loadTrack(trackIndex) {
        const selectedSong = musicFiles[trackIndex];
        audioPlayer.src = `music/${selectedSong}`;
        musicTitle.textContent = selectedSong.replace('.mp3', '');
        playPauseBtn.textContent = '▶️';
        audioPlayer.play();
    }
    
    // Play/Pause functionality
    playPauseBtn.addEventListener('click', () => {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playPauseBtn.textContent = '⏸️';
        } else {
            audioPlayer.pause();
            playPauseBtn.textContent = '▶️';
        }
    });
    
    // Go to the next track
    nextBtn.addEventListener('click', () => {
        currentTrack = (currentTrack + 1) % musicFiles.length;
        loadTrack(currentTrack);
    });
    
    // Go to the previous track
    prevBtn.addEventListener('click', () => {
        currentTrack = (currentTrack - 1 + musicFiles.length) % musicFiles.length;
        loadTrack(currentTrack);
    });
    document.addEventListener('DOMContentLoaded', function() {
    const albumListElement = document.getElementById('albumList');
    
    fetch('php/get_albums.php')
        .then(response => response.json())
        .then(albums => {
            albums.forEach(album => {
                const li = document.createElement('li');
                li.textContent = `${album.title} (${album.genre}) - Released: ${album.release_date}`;
                albumListElement.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching albums:', error));
});
document.addEventListener('DOMContentLoaded', function() {
    const albumListElement = document.getElementById('albumList');
    
    fetch('php/get_albums.php')
        .then(response => response.json())
        .then(albums => {
            albums.forEach(album => {
                const li = document.createElement('li');
                li.textContent = `${album.title} (${album.genre}) - Released: ${album.release_date}`;
                albumListElement.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching albums:', error));
});
