#!/bin/bash
MODELS="AssessedContribution Adoption MhlwResearchGrant OtherResearchGrant Grant Contract Entrust NedoJstOther Donation"
for m in $MODELS; do
    cake/console/cake create_summary_table $m 1 2>&1 | grep -v "Strict"  > /tmp/dump.txt
done
