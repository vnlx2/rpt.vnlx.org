<?php

function e(string $e): string
{
	return htmlentities($e, ENT_QUOTES, "UTF-8");
}

function rupiah_fmt(int $n): string
{
	return number_format($n, 0, ",", ".");
}
