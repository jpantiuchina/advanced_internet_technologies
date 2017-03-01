<?php

session_destroy();

redirect($currentPage->getUrl());
