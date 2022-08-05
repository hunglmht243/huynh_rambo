<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6">
        <div class="copyright text-center text-lg-left text-muted">
          © 2022 <a href="/adm/home" class="font-weight-bold ml-1" target="_blank"><?=strtoupper($_SERVER['SERVER_NAME']);?></a>
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="/" class="nav-link" target="_blank">Version AI 2.0</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</div>
<!-- Argon Scripts -->

<script src="/ADMIN/vendor/lib/js/bundle.js?95118454"></script>
<script src="/ADMIN/vendor/lib/js/app.min.js?47916108"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js?27184805"></script>
<script>
    const pusher = new Pusher('8424c10da800c48a00cf', {
        cluster: 'ap1'
    });
</script>
<script src="/ADMIN/vendor/lib/js/function.js?<?=rand(1,99999999);?>"></script>
<script>
    $(document).ready(function() {
        $('#modalSystem').modal('show');
    });

    function closeModalSystem() {
        setCookie('modalSystem', true, 1);
        $('#modalSystem').modal('hide');
    }
</script>
<!-- Core -->
<script src="/ADMIN/vendor/js/jquery.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/bootstrap.bundle.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/js.cookie.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/jquery.scrollbar.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/jquery-scrollLock.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/jquery.lavalamp.min.js?<?=rand(1,999);?>"></script>
<!-- Optional JS -->
<script src="/ADMIN/vendor/js/Chart.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/Chart.extension.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/jquery.dataTables.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/dataTables.bootstrap4.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/dataTables.buttons.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/buttons.bootstrap4.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/buttons.html5.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/buttons.flash.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/buttons.print.min.js?<?=rand(1,999);?>"></script>
<!-- Argon JS -->
<script src="/ADMIN/vendor/js/argon.js"></script>
<!-- Demo JS - remove this in your project -->
<script src="/ADMIN/vendor/js/demo.min.js?<?=rand(1,999);?>"></script>
<script src="/ADMIN/vendor/js/quill.min.js?<?=rand(1,999);?>"></script>

<script>
    function isJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

</script>

<script>


'use strict';

var VectorMap = (function() {

	// Variables

	var $vectormap = $('[data-toggle="vectormap"]'),
		colors = {
			gray: {
				100: '#f6f9fc',
				200: '#e9ecef',
				300: '#dee2e6',
				400: '#ced4da',
				500: '#adb5bd',
				600: '#8898aa',
				700: '#525f7f',
				800: '#32325d',
				900: '#212529'
			},
			theme: {
				'default': '#172b4d',
				'primary': '#5e72e4',
				'secondary': '#f4f5f7',
				'info': '#11cdef',
				'success': '#2dce89',
				'danger': '#f5365c',
				'warning': '#fb6340'
			},
			black: '#12263F',
			white: '#FFFFFF',
			transparent: 'transparent',
		};

	// Methods

	function init($this) {

		// Get placeholder
		var map = $this.data('map'),

            series = {
                "AU": 760,
                "BR": 550,
                "CA": 120,
                "DE": 1300,
                "FR": 540,
                "GB": 690,
                "GE": 200,
                "IN": 200,
                "RO": 600,
                "RU": 300,
                "US": 2920,
            },

			options = {
				map: map,
                zoomOnScroll: false,
				scaleColors: ['#f00', '#0071A4'],
				normalizeFunction: 'polynomial',
				hoverOpacity: 0.7,
				hoverColor: false,
                backgroundColor: colors.transparent,
                regionStyle: {
                    initial: {
                        fill: colors.gray[200],
                        "fill-opacity": .8,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 1
                    },
                    hover: {
                        fill: colors.gray[300],
                        "fill-opacity": .8,
                        cursor: 'pointer'
                    },
                    selected: {
                        fill: 'yellow'
                    },
                        selectedHover: {
                    }
                },
                markerStyle: {
					initial: {
						fill: colors.theme.warning,
                        "stroke-width": 0
					},
					hover: {
						fill: colors.theme.info,
                        "stroke-width": 0
					},
				},
				markers: [
                    {
						latLng: [41.90, 12.45],
						name: 'Vatican City'
					},
					{
						latLng: [43.73, 7.41],
						name: 'Monaco'
					},
					{
						latLng: [35.88, 14.5],
						name: 'Malta'
					},
					{
						latLng: [1.3, 103.8],
						name: 'Singapore'
					},
					{
						latLng: [1.46, 173.03],
						name: 'Kiribati'
					},
					{
						latLng: [-21.13, -175.2],
						name: 'Tonga'
					},
					{
						latLng: [15.3, -61.38],
						name: 'Dominica'
					},
					{
						latLng: [-20.2, 57.5],
						name: 'Mauritius'
					},
					{
						latLng: [26.02, 50.55],
						name: 'Bahrain'
					}
				],
                series: {
                    regions: [{
                        values: series,
                        scale: [colors.gray[400], colors.gray[500]],
                        normalizeFunction: 'polynomial'
                    }]
                },
			};

		// Init map
		$this.vectorMap(options);

		// Customize controls
		$this.find('.jvectormap-zoomin').addClass('btn btn-sm btn-primary');
		$this.find('.jvectormap-zoomout').addClass('btn btn-sm btn-primary');

	}

	// Events

	if ($vectormap.length) {
		$vectormap.each(function() {
			init($(this));
		});
	}

})();


'use strict';

var QuillEditor = (function() {

	// Variables

	var $quill = $('[data-toggle="quill"]');


	// Methods

	function init($this) {

		// Get placeholder
		var placeholder = $this.data('quill-placeholder');
		var content = $this.data('quill-content');

		// Init editor
		var quill = new Quill($this.get(0), {
			modules: {
				toolbar: [
					['bold', 'italic'],
					['link', 'blockquote', 'code', 'image'],
					[{
						'list': 'ordered'
					}, {
						'list': 'bullet'
					}]
				]
			},
			placeholder: placeholder,
			theme: 'snow'
		});

		quill.on('text-change', function(delta, oldDelta, source) {
			document.getElementById("notification").value = quill.root.innerHTML;
		});
		quill.root.innerHTML = content;
	}

	// Events

	if ($quill.length) {
		$quill.each(function() {
			init($(this));
		});
	}

})();





</script>

</body>

</html>
