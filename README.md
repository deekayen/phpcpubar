phpcpubar
========

[![Project Status: Concept – Minimal or no implementation has been done yet, or the repository is only intended to be a limited example, demo, or proof-of-concept.](https://www.repostatus.org/badges/latest/concept.svg)](https://www.repostatus.org/#concept)

This is a /proc based CPU utilization script. It is based off the phpcpubar script found on freshmeat, but I didn't like that you had to use an external C program to get the CPU stats, so I did it in PHP. It doesn't do an instant measure. It's an average over time. Read more about /proc/stat if you want to. Open cpubar.html in your browser. GD needed in your PHP install.
