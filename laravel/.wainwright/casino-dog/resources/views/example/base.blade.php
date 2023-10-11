l
<base id="game" href="https://cors-4.herokuapp.com/https://d2drhksbtcqozo.cloudfront.net/casino/games-mt/bananatown/">

</base>

<script id="loadGame">
	    function getSearchParameters() {
                var prmstr = window.location.search.substr(1);
                return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
            }

            function transformToAssocArray(prmstr) {
                var params = {};
                var prmarr = prmstr.split("&");
                for (var i = 0; i < prmarr.length; i++) {
                    var tmparr = prmarr[i].split("=");
                    params[tmparr[0]] = tmparr[1];
                }
                return params;
            }
            var params = getSearchParameters();

		var base = document.createElement('html');
        let decoded = window.atob(params.dom);
        base.innerHTML = decoded;
        document.getElementById("game").appendChild(base);
        loadGame.remove();
</script>