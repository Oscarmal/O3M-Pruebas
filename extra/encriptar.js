<script type="text/javascript">
    hash = hex_md4("input string");
    hash = hex_md5("input string");
    hash = hex_sha1("input string");
</script>



<script type="text/javascript">
    hash = b64_md4("input string");
    hash = b64_md5("input string");
    hash = b64_sha1("input string");
</script>


hexcase	The case of the letters A-F in hexadecimal output	0 - lower case (default)
1 - upper case
b64pad	The character used to pad base-64 output to a multiple of 3 bytes	"" - no padding (default)
"=" - for strict RFC compliance
chrsz	Whether string input should be treated as ASCII or UniCode	8 - ASCII (default)
16 - UniCode

To set a variable, use a syntax like this:

<script type="text/javascript" src="md5.js"></script>
<script type="text/javascript">
    chrsz = 16;
</script>


First download the appropriate files from the links above. Save them in the same directory as your html file and insert a tag like:

<script type="text/javascript" src="md5.js"></script>

When you want to calculate a hash, use:

<script type="text/javascript">
    hash = hex_md5("input string");
</script>
