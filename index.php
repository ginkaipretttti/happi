<?php
// Set the title for the page
$pageTitle = "Happy Birthday Ginny";

// Message content
$birthdayMessage = "Wahh, happy birthday my love!
I’ll always be here for you always.
Don’t forget that you’ll always have me, okay?
I miss you so much, and I really mean it.
Please take care of yourself always, alright?
I wish you all the best, muahhh!
You’ll always be the prettiest woman in my eyes, love. 💖

This website might not have a lot going on no music or fancy interactions like I used to make for you
but it’s a milestone for me, because I made this all on my own.
I’m really proud to say that I built this website for my baby using only what I’ve learned.
But more than anything, I hope you enjoy your birthday, okay?
Keep smiling, pretty you’re everyone’s sunshine. and i will always be your man🌼

-Sekai 💖";

// Image path - update this with your actual image path
$mainImagePath = "ginny.jpg"; // Replace with your actual image

// Cat bubble images - update these with your actual cat image paths
$catImages = [
    "321.jpg",
    "34.jpg",
    "3.jpg",
    "2.jpg",
    "1.jpg",
    "2.jpg"
];

// Audio file path
$audioPath = "audio/happy-birthday.mp3";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    
    <!-- Add Tailwind CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Custom animations */
        <?php 
        $directions = [];
        $rotations = [];
        for ($i = 0; $i < 20; $i++) {
            $directions[$i] = rand(0, 1) ? '+' : '-';
            $rotations[$i] = rand(0, 360);
        }
        ?>
        
        <?php for ($i = 0; $i < 20; $i++): ?>
        .heart-<?php echo $i; ?> {
            animation-name: float-<?php echo $i; ?>;
        }
        
        @keyframes float-<?php echo $i; ?> {
            0% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.5;
            }
            100% {
                transform: translate(<?php echo $directions[$i]; ?>50px, -100px) rotate(<?php echo $rotations[$i]; ?>deg);
                opacity: 0;
            }
        }
        <?php endfor; ?>
        
        /* Fixed bubble animation - pre-generate random values */
        <?php 
        $bubbleRotations = [];
        for ($i = 0; $i < 6; $i++) {
            $bubbleRotations[$i] = rand(0, 1) ? '+' : '-';
        }
        ?>
        
        <?php for ($i = 0; $i < 6; $i++): ?>
        .bubble-<?php echo $i; ?> {
            animation-name: floatBubble-<?php echo $i; ?>;
        }
        
        @keyframes floatBubble-<?php echo $i; ?> {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(<?php echo $bubbleRotations[$i]; ?>5deg);
            }
        }
        <?php endfor; ?>
        
        .heart {
            position: absolute;
            color: #f9a8d4;
            animation-duration: 5s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
        
        .bubble {
            position: absolute;
            border-radius: 50%;
            border: 2px solid #f9a8d4;
            background-color: white;
            padding: 4px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            animation-duration: 8s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
            overflow: hidden;
            z-index: 50;
        }
        
        .bubble img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        
        /* Audio player styling */
        .audio-player {
            display: flex;
            align-items: center;
            gap: 16px;
            background-color: #fce7f3;
            padding: 16px;
            border-radius: 16px;
            margin-top: 32px;
        }
        
        .play-button {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #ec4899;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .play-button:hover {
            background-color: #db2777;
        }
        
        .volume-slider {
            flex: 1;
            height: 4px;
            background-color: #fce7f3;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .volume-slider::-webkit-slider-thumb {
            background-color: #ec4899;
            border: 2px solid #ec4899;
        }
        
        /* Container for the entire birthday card */
        .birthday-container {
            position: relative;
            width: 100%;
            max-width: 1000px; /* Wider container to accommodate bubbles */
            margin: 0 auto;
        }
        
        /* Main card styling */
        .birthday-card {
            width: 100%;
            max-width: 4xl;
            background-color: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            position: relative;
            z-index: 10;
            margin: 0 auto;
        }
    </style>
</head>
<body class="min-h-screen bg-pink-50 flex items-center justify-center p-4">
    <div class="birthday-container">
        <!-- Floating Bubbles with Cat Images - NOW OUTSIDE THE CARD -->
        <?php 
        // Define positions for bubbles that are outside the card
        $positions = [
            ['left' => -10, 'top' => 10],    // Left top
            ['left' => -8, 'top' => 50],     // Left middle
            ['left' => -5, 'top' => 80],     // Left bottom
            ['left' => 105, 'top' => 15],    // Right top
            ['left' => 108, 'top' => 60],    // Right middle
            ['left' => 103, 'top' => 85],    // Right bottom
        ];
        
        for ($i = 0; $i < 6; $i++): 
            $size = rand(60, 90);
            $delay = rand(0, 5);
            $duration = rand(8, 15);
            
            // Use predefined positions to ensure bubbles are outside the card
            $left = $positions[$i]['left'];
            $top = $positions[$i]['top'];
        ?>
            <div class="bubble bubble-<?php echo $i; ?>" style="
                width: <?php echo $size; ?>px;
                height: <?php echo $size; ?>px;
                left: <?php echo $left; ?>%;
                top: <?php echo $top; ?>%;
                animation-delay: <?php echo $delay; ?>s;
                animation-duration: <?php echo $duration; ?>s; ">
                <img src="<?php echo isset($catImages[$i]) ? $catImages[$i] : 'images/cat-placeholder.jpg'; ?>" alt="Cute cat <?php echo $i+1; ?>">
            </div>
        <?php endfor; ?>

        <!-- Main Birthday Card -->
        <div class="birthday-card">
            <div class="p-8 relative z-10">
                <div class="flex items-center gap-2 mb-8">
                    <h1 class="text-5xl font-bold text-pink-500">Happy Birthday myloveee</h1>
                    <span class="text-4xl">🎉</span>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Fixed Image Section -->
                    <div class="relative rounded-3xl overflow-hidden bg-gradient-to-b from-pink-100 to-pink-200 aspect-square">
                        <img 
                            src="<?php echo $mainImagePath; ?>" 
                            alt="Birthday Image" 
                            class="w-full h-full object-cover"
                        >
                    </div>

                    <!-- Message Section -->
                    <div class="flex flex-col justify-between">
                        <div class="space-y-4">
                            <h2 class="text-3xl font-bold text-pink-500 flex items-center gap-2">
                                Wishing You Joy! 🎂
                            </h2>
                            <p class="text-lg text-pink-600 leading-relaxed">
                                <?php echo $birthdayMessage; ?>
                            </p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Hearts -->
    <div class="fixed inset-0 pointer-events-none">
        <?php for ($i = 0; $i < 20; $i++): 
            $left = rand(0, 100);
            $top = rand(0, 100);
            $size = rand(10, 30);
            $delay = rand(0, 5);
            $duration = rand(5, 15);
        ?>
            <div class="heart heart-<?php echo $i; ?>" style="
                left: <?php echo $left; ?>%;
                top: <?php echo $top; ?>%;
                font-size: <?php echo $size; ?>px;
                animation-delay: <?php echo $delay; ?>s;
                animation-duration: <?php echo $duration; ?>s; ">♥</div>
        <?php endfor; ?>
    </div>

    <!-- Hidden audio element -->
    <audio id="birthdayAudio" src="<?php echo $audioPath; ?>" loop preload="auto"></audio>

    <!-- JavaScript for audio functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.getElementById('birthdayAudio');
            const playButton = document.getElementById('playButton');
            const volumeSlider = document.getElementById('volumeSlider');
            let isPlaying = false;

            // Fix for mobile devices - need user interaction
            audio.load();

            playButton.addEventListener('click', function() {
                if (isPlaying) {
                    audio.pause();
                    playButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>';
                } else {
                    // Promise to handle autoplay restrictions
                    const playPromise = audio.play();
                    
                    if (playPromise !== undefined) {
                        playPromise.then(_ => {
                            // Playback started successfully
                            playButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>';
                        })
                        .catch(error => {
                            // Auto-play was prevented
                            console.log("Playback was prevented:", error);
                            // Keep the play button state
                            isPlaying = false;
                            return;
                        });
                    }
                }
                isPlaying = !isPlaying;
            });

            volumeSlider.addEventListener('input', function() {
                audio.volume = this.value;
            });
            
            // Set initial volume
            audio.volume = volumeSlider.value;
        });
    </script>
</body>
</html>