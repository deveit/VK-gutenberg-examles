(function($, selector) {
    class Video_Section {
        constructor($element) {
            //State
            this.$section = $element;
            this.$window = $(window);
            this.$stickyToggle = this.$section.find('.video-category-filter-list-sticky-toggle');
            this.$stickyFilterList = this.$section.find('.video-category-filter-list-sticky');
            this.$topFiltersList = this.$section.find('.video-category-filter-list').first();
            this.$filters = this.$section.find('.video-filter');
    
            // Events
            $(document).ready(this.maybeSelectFilter.bind(this));
            this.$window.on('load scroll', this.maybeScroll.bind(this));
            this.$stickyToggle.on('click', this.toggleOnClick.bind(this));
            this.$section.on('ajax-loaded', this.refreshOffset.bind(this));
            this.$window.on('load scroll resize', this.windowOnChange.bind(this));
            this.$window.on('resize', this.refreshOffset.bind(this));
            this.$filters.on('click', this.filtersOnClick.bind(this));
    
            // Init
            this.refreshOffset();
        }
        
        refreshOffset() {
            this.topOffset = this.$topFiltersList.offset().top;
            this.bottomOffset = this.$section.offset().top + this.$section.height() + 160;
        }
    
        toggleOnClick() {
            if (this.$stickyFilterList.hasClass('video-category-filter-list-sticky--visible')) {
                this.hideFilters();
                this.windowOnChange();
            } else {
                this.showFilters();
            }
        }
        
        windowOnChange() {
            var windowTopTrigger = this.$window.scrollTop();
            var windowBottomTrigger = windowTopTrigger + this.$window.height();
    
            // Mobile only
            if (this.$window.width() > 767) {
                this.hideToggle()
                this.hideFilters();
                return;
            }
    
            if (windowTopTrigger > this.topOffset && windowBottomTrigger < this.bottomOffset) {
                this.showToggle();
            } else {
                this.hideToggle();
                this.hideFilters();
            }
        }
    
        filtersOnClick(e) {
            e.preventDefault();
    
            var $this = $(e.currentTarget);
            var selectedSlug = $this.data('video-category-slug');
            var $sameFilters = this.$section.find(`[data-video-category-slug="${selectedSlug}"]`);
            var $ajaxContainer = this.$section.find('.ajax-reload-videos');
            var isActive = $sameFilters.hasClass('active');
            var catArr = [];

            this.$filters.removeClass('active');

            if (!isActive) {
                $sameFilters.addClass('active');
                catArr.push(selectedSlug);
            }

            // Save selected filter
            sessionStorage.setItem('video-category-filter', JSON.stringify(catArr));

            $ajaxContainer.addClass('active');

            $.ajax({
                url : the_ajax_script.ajaxurl,
                type : 'post',
                data : {
                    'action' : 'filter_by_video_category',
                    'video' : catArr
                },
                success : function( response ) {
                    $ajaxContainer.html(response);
                    $ajaxContainer.removeClass('active') ;
                    this.$section.trigger('ajax-loaded')
                }.bind(this)
            });
        }

        maybeSelectFilter() {
            let returned = Boolean(sessionStorage.getItem('returned-from-single-video'));
            let filter = sessionStorage.getItem('video-category-filter');
            let selectedSlug;

            // Cleanup
            sessionStorage.removeItem('video-category-filter')
            
            if (returned && typeof filter === 'string') {
                selectedSlug = JSON.parse(filter)[0];
                // Select filter
                this.$topFiltersList.find(`[data-video-category-slug="${selectedSlug}"]`).click();
            }
        }

        maybeScroll() {
            let returned = Boolean(sessionStorage.getItem('returned-from-single-video'));

            if (returned) {
                this.$window.scrollTop(this.$section.offset().top);
            }

            // Cleanup
            // Timeout wrapper need for fixing window first second scroll to top
            setTimeout(() => sessionStorage.removeItem('returned-from-single-video'), 1000);
        }
    
        showFilters() {
            this.$stickyFilterList.addClass('video-category-filter-list-sticky--visible');
        }
    
        hideFilters() {
            this.$stickyFilterList.removeClass('video-category-filter-list-sticky--visible');
        }
    
        showToggle() {
            this.$stickyToggle.addClass('video-category-filter-list-sticky-toggle--visible');
        }
    
        hideToggle() {
            this.$stickyToggle.removeClass('video-category-filter-list-sticky-toggle--visible');
        }
    }

    // Initialization
    $(document).ready(function() {
        $(selector).each(function() {
            return new Video_Section($(this));
        });
    });
})(jQuery, '.video-list-section');