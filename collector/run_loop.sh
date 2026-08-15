#!/bin/bash
cd "/f/projects/chill/web/master/collector"
for i in $(seq 1 50); do
  echo "=== iteration $i ($(date)) ==="
  OUT=$(.venv/Scripts/python.exe collect_videos.py 2>&1)
  echo "$OUT"
  TOCHECK=$(echo "$OUT" | head -1 | grep -oE "^[0-9]+")
  if echo "$OUT" | grep -qi "quotaExceeded\|HttpError 403\|dailyLimitExceeded"; then
    echo ">>> STOPPING: quota exceeded"
    break
  fi
  if [ "$TOCHECK" = "0" ]; then
    echo ">>> DONE: no more channels to check"
    break
  fi
done
