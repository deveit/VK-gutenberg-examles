(function($, id, options, $window, $mobileBgVideo, $backLink) {
    class Video_Player {
        id;
        options = {};
        progressMousedown = false;
        $mobileBgVideo;
        player;
        duration;
        currentTime;
        volume = 0.75;
        $window;
        
        constructor( id, options = {} ) {
            if (typeof id !== 'string' || typeof options !== 'object' || !$(`#${id}`).length ) {
                return;
            }
            
            // State
            this.id = id;
            this.options = options;
            this.$window = $window;
            this.$mobileBgVideo = $mobileBgVideo;
            this.$backLink = $backLink;


            if (this.isMobile()) {
                this.options.vimeo.autoplay = false;
            }

            // Init
            this.events();
            this.initPlayer().then( () => {
                this.playerEvents();
                this.changeVolume(this.options.vimeo.muted ? 0 : this.volume);
            });

            this.maybePauseMobileBgVideo();
        }
        
        async initPlayer() {
            this.player = new Vimeo.Player(this.id, this.options.vimeo);
            await this.defineDuration();
        }

        async defineDuration() {
            this.duration = await this.player.getDuration();
            $(this.options.inputs.progressInput+ ', ' +this.options.ui.progress).attr('max', this.duration);
            $(this.options.ui.totalTime).text(() => this.toHHMMSS(this.duration));
        }

        events() {
            //Back link
            this.$backLink.on('click', () => {
                // Save for scroll
                sessionStorage.setItem('returned-from-single-video', true);
            });
        }
        
        playerEvents() {
            // Load
            this.player.on('loaded', () => {
                this.updateProgress(0);
                if (!this.options.vimeo.autoplay) this.showPlayButton();
                if (this.options.vimeo.autoplay) this.showPauseButton();
            });

            // Change progress
            $(this.options.inputs.progressInput)
            .on('mousedown', () => { this.progressMousedown = true; })
            .on('mouseup', () => { this.progressMousedown = false; })
            .change(e => {
                var sec = $(e.currentTarget).val();
                this.player.setCurrentTime(sec);
                this.updateProgress(sec);
            });

            // Change volume
            $(this.options.inputs.volumeInput).on('input change', e => {
                this.changeVolume($(e.currentTarget).val());
            });

            // Sync UI progress
            this.player.on('timeupdate', data => {
                if (this.progressMousedown) return;
                this.updateProgress(data.seconds);
            });
            
            // Sync UI value
            this.player.on('volumechange', volume => this.updateVolume(volume.volume));

            // Turn sound off
            $(this.options.ui.sound).click(() => this.soundOff());

            // Turn sound on
            $(this.options.ui.mute).click(() => this.soundOn());

            // Play
            this.player.on('play', this.showPauseButton.bind(this));
            $(this.options.ui.play).click(this.play.bind(this));
           

            //Pause
            this.player.on('pause', this.showPlayButton.bind(this));
            $(this.options.ui.pause).click(this.pause.bind(this));

            //Pause on resize
            this.$window.on('resize', () => {
                if (this.isMobile()) {
                    this.pause();
                }

                this.maybePauseMobileBgVideo();
            });

            //Hide cover image
            this.player.on('play', () => $(this.options.ui.videoCover).hide());

            // Pause on space button 
            this.$window.on('keydown', (e) => {
                if (e.originalEvent.keyCode !== 32) {
                    return;
                }

                this.player.getPaused().then(paused => {
                    if (paused) {
                        this.play();
                    } else {
                        this.pause();
                    }
                })
            });
        }

        play() {
            this.player.play();
        }

        pause() {
            this.player.pause();
        }

        showPauseButton() {
            $(this.options.ui.play).hide();
            $(this.options.ui.pause).show();
        }

        showPlayButton() {
            $(this.options.ui.play).show();
            $(this.options.ui.pause).hide();
        }

        soundOn(val = 0.5) {
            this.player.setVolume(val);
            $(this.options.ui.sound).show();
            $(this.options.ui.mute).hide();
            $(this.options.inputs.volumeInput+ ', ' +this.options.ui.volume).val(val);
        }

        soundOff() {
            this.player.setVolume(0);
            $(this.options.ui.sound).show();
            $(this.options.ui.mute).hide();
            $(this.options.inputs.volumeInput+ ', ' +this.options.ui.volume).val(0);
        }
        
        changeVolume(val) {
            this.player.setVolume(val);
        }

        updateVolume(val) {
            this.volume = val;
            $(this.options.ui.volume + ', ' + this.options.inputs.volumeInput).val(val);
        }
        
        updateProgress(sec) {
            this.currentTime = sec;
            $(this.options.inputs.progressInput + ', ' + this.options.ui.progress).val(sec);
            $(this.options.ui.currentTime).text(this.toHHMMSS(Math.round(sec)));
        }

        toHHMMSS(secs) {
            var sec_num = parseInt(secs, 10);
            var hours   = Math.floor(sec_num / 3600);
            var minutes = Math.floor(sec_num / 60) % 60;
            var seconds = sec_num % 60;
            
            return [hours,minutes,seconds]
            .map(v => v < 10 ? '0' + v : v)
            .filter((v,i) => v !== '00' || i > 0)
            .join(':');
        }

        isMobile() {
            return this.$window.width() < 768;
        }

        maybePauseMobileBgVideo() {
            if (this.$mobileBgVideo.length) {
                if (this.isMobile()) {
                    this.$mobileBgVideo[0].play();
                } else {
                    this.$mobileBgVideo[0].pause();
                }
            }
        }
    }
    
    // Initialization
    $(document).ready(function() {
        return new Video_Player(id, options);
    });
    
})(
jQuery, 
'vimeo',
{
    vimeo: {
        muted: false,
        loop: true,
        autoplay: false,
        controls: false
    },
    inputs: {
        progressInput: '#setTime',
        volumeInput: '.volume',
    },
    ui: {
        progress: '.currentPlay',
        volume: '.volumeProg',
        currentTime: '.status',
        totalTime: '.total-time',
        sound: '.speaker .sound',
        mute: '.speaker .mute',
        play: '.play',
        videoCover: '.video-cover-image',
        pause: '.pause'
    }
},
jQuery(window),
jQuery('.mobile-cover-video'),
jQuery('.back-link')
);
