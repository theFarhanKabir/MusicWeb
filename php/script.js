document.addEventListener("DOMContentLoaded", function() {
    var audioPlayer = document.getElementById("audioPlayer");
    
    // Function to play/pause audio
    function toggleAudioPlayback() {
        if (audioPlayer.paused) {
            audioPlayer.play();
        } else {
            audioPlayer.pause();
        }
    }
    
    // Add event listeners
    audioPlayer.addEventListener("play", function() {
        console.log("Playing audio...");
    });
    
    audioPlayer.addEventListener("pause", function() {
        console.log("Pausing audio...");
    });
    
    audioPlayer.addEventListener("timeupdate", function() {
        console.log("Current time: " + this.currentTime);
        
        // Update current time display
        document.getElementById('currentTime').textContent = formatTime(this.currentTime);
        document.getElementById('duration').textContent = formatTime(this.duration);
    });
    
    audioPlayer.addEventListener("ended", function() {
        console.log("Audio ended playing.");
    });

    // Volume control
    document.getElementById('volumeControl').addEventListener('input', function(e) {
        audioPlayer.volume = parseFloat(this.value);
    });

    // Seek backward/forward functions
    function seekBackward() {
        audioPlayer.currentTime -= 10;
    }

    function seekForward() {
        audioPlayer.currentTime += 10;
    }

    // Format time helper function
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
    }

    // Play/Pause button functionality
    document.querySelector('#playerControls button:first-child').addEventListener('click', toggleAudioPlayback);

    // Seek buttons functionality
    document.querySelector('#playerControls button:nth-child(3)').addEventListener('click', seekBackward);
    document.querySelector('#playerControls button:nth-child(4)').addEventListener('click', seekForward);
});